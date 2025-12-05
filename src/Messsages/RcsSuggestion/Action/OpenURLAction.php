<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction\Application;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction\WebviewViewMode;

/**
 * Opens the user's default web browser app to the specified URL.
 *
 * @phpstan-type OpenURLActionShape = array{
 *   application: value-of<Application>,
 *   url: string,
 *   webview_view_mode: value-of<WebviewViewMode>,
 *   description?: string|null,
 * }
 */
final class OpenURLAction implements BaseModel
{
    /** @use SdkModel<OpenURLActionShape> */
    use SdkModel;

    /**
     * URL open application, browser or webview.
     *
     * @var value-of<Application> $application
     */
    #[Api(enum: Application::class)]
    public string $application;

    #[Api]
    public string $url;

    /** @var value-of<WebviewViewMode> $webview_view_mode */
    #[Api(enum: WebviewViewMode::class)]
    public string $webview_view_mode;

    /**
     * Accessbility description for webview.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * `new OpenURLAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OpenURLAction::with(application: ..., url: ..., webview_view_mode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OpenURLAction)
     *   ->withApplication(...)
     *   ->withURL(...)
     *   ->withWebviewViewMode(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Application|value-of<Application> $application
     * @param WebviewViewMode|value-of<WebviewViewMode> $webview_view_mode
     */
    public static function with(
        Application|string $application,
        string $url,
        WebviewViewMode|string $webview_view_mode,
        ?string $description = null,
    ): self {
        $obj = new self;

        $obj['application'] = $application;
        $obj['url'] = $url;
        $obj['webview_view_mode'] = $webview_view_mode;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    /**
     * URL open application, browser or webview.
     *
     * @param Application|value-of<Application> $application
     */
    public function withApplication(Application|string $application): self
    {
        $obj = clone $this;
        $obj['application'] = $application;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * @param WebviewViewMode|value-of<WebviewViewMode> $webviewViewMode
     */
    public function withWebviewViewMode(
        WebviewViewMode|string $webviewViewMode
    ): self {
        $obj = clone $this;
        $obj['webview_view_mode'] = $webviewViewMode;

        return $obj;
    }

    /**
     * Accessbility description for webview.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }
}
