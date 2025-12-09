<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   webviewViewMode: value-of<WebviewViewMode>,
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
    #[Required(enum: Application::class)]
    public string $application;

    #[Required]
    public string $url;

    /** @var value-of<WebviewViewMode> $webviewViewMode */
    #[Required('webview_view_mode', enum: WebviewViewMode::class)]
    public string $webviewViewMode;

    /**
     * Accessbility description for webview.
     */
    #[Optional]
    public ?string $description;

    /**
     * `new OpenURLAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OpenURLAction::with(application: ..., url: ..., webviewViewMode: ...)
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
     * @param WebviewViewMode|value-of<WebviewViewMode> $webviewViewMode
     */
    public static function with(
        Application|string $application,
        string $url,
        WebviewViewMode|string $webviewViewMode,
        ?string $description = null,
    ): self {
        $self = new self;

        $self['application'] = $application;
        $self['url'] = $url;
        $self['webviewViewMode'] = $webviewViewMode;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * URL open application, browser or webview.
     *
     * @param Application|value-of<Application> $application
     */
    public function withApplication(Application|string $application): self
    {
        $self = clone $this;
        $self['application'] = $application;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * @param WebviewViewMode|value-of<WebviewViewMode> $webviewViewMode
     */
    public function withWebviewViewMode(
        WebviewViewMode|string $webviewViewMode
    ): self {
        $self = clone $this;
        $self['webviewViewMode'] = $webviewViewMode;

        return $self;
    }

    /**
     * Accessbility description for webview.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
