<?php
/**
 * @license GPL-2.0-or-later
 *
 * Modified using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare( strict_types=1 );

namespace KadenceWP\KadencePro\StellarWP\Uplink\Components\Admin;

use InvalidArgumentException;
use KadenceWP\KadencePro\StellarWP\Uplink\Auth\Admin\Disconnect_Controller;
use KadenceWP\KadencePro\StellarWP\Uplink\Auth\Auth_Url_Builder;
use KadenceWP\KadencePro\StellarWP\Uplink\Auth\Authorizer;
use KadenceWP\KadencePro\StellarWP\Uplink\Auth\Token\Token_Factory;
use KadenceWP\KadencePro\StellarWP\Uplink\Components\Controller;
use KadenceWP\KadencePro\StellarWP\Uplink\Config;
use KadenceWP\KadencePro\StellarWP\Uplink\Resources\Collection;
use KadenceWP\KadencePro\StellarWP\Uplink\View\Contracts\View;

final class Authorize_Button_Controller extends Controller {

	/**
	 * The view file, without ext, relative to the root views directory.
	 */
	public const VIEW = 'admin/authorize-button';

	/**
	 * @var Authorizer
	 */
	private $authorizer;

	/**
	 * @var Token_Factory
	 */
	private $token_manager_factory;

	/**
	 * @var Auth_Url_Builder
	 */
	private $url_builder;

	/**
	 * @var Collection
	 */
	private $resources;

	/**
	 * @var Disconnect_Controller
	 */
	private $disconnect_controller;

	/**
	 * @param  View  $view  The View Engine to render views.
	 * @param  Authorizer  $authorizer  Determines if the current user can perform actions.
	 * @param  Token_Factory  $token_manager_factory  The Token Manager Factory.
	 * @param  Auth_Url_Builder  $url_builder  The Auth URL Builder.
	 * @param  Collection  $resources  The resources collection.
	 * @param  Disconnect_Controller  $disconnect_controller  The disconnect controller.
	 */
	public function __construct(
		View $view,
		Authorizer $authorizer,
		Token_Factory $token_manager_factory,
		Auth_Url_Builder $url_builder,
		Collection $resources,
		Disconnect_Controller $disconnect_controller
	) {
		parent::__construct( $view );

		$this->authorizer            = $authorizer;
		$this->token_manager_factory = $token_manager_factory;
		$this->url_builder           = $url_builder;
		$this->resources             = $resources;
		$this->disconnect_controller = $disconnect_controller;
	}

	/**
	 * Renders the authorize-button view.
	 *
	 * @param  array{slug?: string, domain?: string} $args The Product slug and license domain.
	 *
	 * @see src/views/admin/authorize-button.php
	 *
	 * @throws InvalidArgumentException
	 */
	public function render( array $args = [] ): void {
		global $pagenow;

		$slug   = $args['slug'] ?? '';
		$domain = $args['domain'] ?? '';

		if ( empty ( $slug ) ) {
			throw new InvalidArgumentException( __( 'The Product slug cannot be empty', '%TEXTDOMAIN%' ) );
		}

		$url = $this->url_builder->build( $slug, $domain );

		if ( ! $url ) {
			return;
		}

		$plugin = $this->resources->offsetGet( $slug );

		if ( ! $plugin ) {
			return;
		}

		$authenticated = false;
		$target        = '_blank';
		$link_text     = __( 'Connect', '%TEXTDOMAIN%' );
		$classes       = [
			'uplink-authorize',
			'not-authorized',
		];

		if ( ! $this->authorizer->can_auth() ) {
			$target    = '_self';
			$link_text = __( 'Contact your network administrator to connect', '%TEXTDOMAIN%' );
			$url       = get_admin_url( get_current_blog_id(), 'network/' );
		} elseif ( $this->token_manager_factory->make( $plugin )->get() ) {
			$authenticated = true;
			$target        = '_self';
			$link_text     = __( 'Disconnect', '%TEXTDOMAIN%' );
			$url           = $this->disconnect_controller->get_url( $plugin );
			$classes[1]    = 'authorized';
		}

		$hook_prefix = Config::get_hook_prefix();

		/**
		 * Filter the link text.
		 *
		 * @param  string  $link_text  The current link text.
		 * @param  bool  $authenticated  Whether they are authenticated.
		 * @param  string|null  $pagenow  The value of WordPress's pagenow.
		 */
		$link_text = apply_filters(
			"stellarwp/uplink/$hook_prefix/view/authorize_button/link_text",
			$link_text,
			$authenticated,
			$pagenow
		);

		/**
		 * Filter the hyperlink url.
		 *
		 * @param  string  $url  The current hyperlink url.
		 * @param  bool  $authenticated  Whether they are authenticated.
		 * @param  string|null  $pagenow  The value of WordPress's pagenow.
		 */
		$url = apply_filters(
			"stellarwp/uplink/$hook_prefix/view/authorize_button/url",
			$url,
			$authenticated,
			$pagenow
		);

		/**
		 * Filter the link target.
		 *
		 * @param  string  $target  The current link target.
		 * @param  bool  $authenticated  Whether they are authenticated.
		 * @param  string|null  $pagenow  The value of WordPress's pagenow.
		 */
		$target = apply_filters(
			"stellarwp/uplink/$hook_prefix/view/authorize_button/target",
			$target,
			$authenticated,
			$pagenow
		);

		/**
		 * Filter the HTML wrapper tag.
		 *
		 * @param  string  $tag  The HTML tag to use for the wrapper.
		 * @param  bool  $authenticated  Whether they are authenticated.
		 * @param  string|null  $pagenow  The value of WordPress's pagenow.
		 */
		$tag = apply_filters(
			"stellarwp/uplink/$hook_prefix/view/authorize_button/tag",
			'div',
			$authenticated,
			$pagenow
		);

		/**
		 * Filter the CSS classes
		 *
		 * @param  array  $classes  An array of CSS classes.
		 * @param  bool  $authenticated  Whether they are authenticated.
		 * @param  string|null  $pagenow  The value of WordPress's pagenow.
		 */
		$classes = (array) apply_filters(
			"stellarwp/uplink/$hook_prefix/view/authorize_button/classes",
			$classes,
			$authenticated,
			$pagenow
		);

		echo $this->view->render( self::VIEW, [
			'link_text' => $link_text,
			'url'       => $url,
			'target'    => $target,
			'tag'       => $tag,
			'classes'   => $this->classes( $classes ),
		] );
	}

}
