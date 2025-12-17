<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsSuggestion\Action\CreateCalendarEventAction;
use Telnyx\Messsages\RcsSuggestion\Action\DialAction;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction;

/**
 * When tapped, initiates the corresponding native action on the device.
 *
 * @phpstan-import-type CreateCalendarEventActionShape from \Telnyx\Messsages\RcsSuggestion\Action\CreateCalendarEventAction
 * @phpstan-import-type DialActionShape from \Telnyx\Messsages\RcsSuggestion\Action\DialAction
 * @phpstan-import-type OpenURLActionShape from \Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction
 * @phpstan-import-type ViewLocationActionShape from \Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction
 *
 * @phpstan-type ActionShape = array{
 *   createCalendarEventAction?: null|CreateCalendarEventAction|CreateCalendarEventActionShape,
 *   dialAction?: null|DialAction|DialActionShape,
 *   fallbackURL?: string|null,
 *   openURLAction?: null|OpenURLAction|OpenURLActionShape,
 *   postbackData?: string|null,
 *   shareLocationAction?: array<string,mixed>|null,
 *   text?: string|null,
 *   viewLocationAction?: null|ViewLocationAction|ViewLocationActionShape,
 * }
 */
final class Action implements BaseModel
{
    /** @use SdkModel<ActionShape> */
    use SdkModel;

    /**
     * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
     */
    #[Optional('create_calendar_event_action')]
    public ?CreateCalendarEventAction $createCalendarEventAction;

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     */
    #[Optional('dial_action')]
    public ?DialAction $dialAction;

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    #[Optional('fallback_url')]
    public ?string $fallbackURL;

    /**
     * Opens the user's default web browser app to the specified URL.
     */
    #[Optional('open_url_action')]
    public ?OpenURLAction $openURLAction;

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    #[Optional('postback_data')]
    public ?string $postbackData;

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     *
     * @var array<string,mixed>|null $shareLocationAction
     */
    #[Optional('share_location_action', map: 'mixed')]
    public ?array $shareLocationAction;

    /**
     * Text that is shown in the suggested action. Maximum 25 characters.
     */
    #[Optional]
    public ?string $text;

    /**
     * Opens the user's default map app and selects the agent-specified location.
     */
    #[Optional('view_location_action')]
    public ?ViewLocationAction $viewLocationAction;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreateCalendarEventActionShape $createCalendarEventAction
     * @param DialActionShape $dialAction
     * @param OpenURLActionShape $openURLAction
     * @param array<string,mixed> $shareLocationAction
     * @param ViewLocationActionShape $viewLocationAction
     */
    public static function with(
        CreateCalendarEventAction|array|null $createCalendarEventAction = null,
        DialAction|array|null $dialAction = null,
        ?string $fallbackURL = null,
        OpenURLAction|array|null $openURLAction = null,
        ?string $postbackData = null,
        ?array $shareLocationAction = null,
        ?string $text = null,
        ViewLocationAction|array|null $viewLocationAction = null,
    ): self {
        $self = new self;

        null !== $createCalendarEventAction && $self['createCalendarEventAction'] = $createCalendarEventAction;
        null !== $dialAction && $self['dialAction'] = $dialAction;
        null !== $fallbackURL && $self['fallbackURL'] = $fallbackURL;
        null !== $openURLAction && $self['openURLAction'] = $openURLAction;
        null !== $postbackData && $self['postbackData'] = $postbackData;
        null !== $shareLocationAction && $self['shareLocationAction'] = $shareLocationAction;
        null !== $text && $self['text'] = $text;
        null !== $viewLocationAction && $self['viewLocationAction'] = $viewLocationAction;

        return $self;
    }

    /**
     * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
     *
     * @param CreateCalendarEventActionShape $createCalendarEventAction
     */
    public function withCreateCalendarEventAction(
        CreateCalendarEventAction|array $createCalendarEventAction
    ): self {
        $self = clone $this;
        $self['createCalendarEventAction'] = $createCalendarEventAction;

        return $self;
    }

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     *
     * @param DialActionShape $dialAction
     */
    public function withDialAction(DialAction|array $dialAction): self
    {
        $self = clone $this;
        $self['dialAction'] = $dialAction;

        return $self;
    }

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $self = clone $this;
        $self['fallbackURL'] = $fallbackURL;

        return $self;
    }

    /**
     * Opens the user's default web browser app to the specified URL.
     *
     * @param OpenURLActionShape $openURLAction
     */
    public function withOpenURLAction(OpenURLAction|array $openURLAction): self
    {
        $self = clone $this;
        $self['openURLAction'] = $openURLAction;

        return $self;
    }

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    public function withPostbackData(string $postbackData): self
    {
        $self = clone $this;
        $self['postbackData'] = $postbackData;

        return $self;
    }

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     *
     * @param array<string,mixed> $shareLocationAction
     */
    public function withShareLocationAction(array $shareLocationAction): self
    {
        $self = clone $this;
        $self['shareLocationAction'] = $shareLocationAction;

        return $self;
    }

    /**
     * Text that is shown in the suggested action. Maximum 25 characters.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Opens the user's default map app and selects the agent-specified location.
     *
     * @param ViewLocationActionShape $viewLocationAction
     */
    public function withViewLocationAction(
        ViewLocationAction|array $viewLocationAction
    ): self {
        $self = clone $this;
        $self['viewLocationAction'] = $viewLocationAction;

        return $self;
    }
}
