<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsSuggestion;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsSuggestion\Action\CreateCalendarEventAction;
use Telnyx\Messages\RcsSuggestion\Action\DialAction;
use Telnyx\Messages\RcsSuggestion\Action\OpenURLAction;
use Telnyx\Messages\RcsSuggestion\Action\OpenURLAction\Application;
use Telnyx\Messages\RcsSuggestion\Action\OpenURLAction\WebviewViewMode;
use Telnyx\Messages\RcsSuggestion\Action\ViewLocationAction;
use Telnyx\Messages\RcsSuggestion\Action\ViewLocationAction\LatLong;

/**
 * When tapped, initiates the corresponding native action on the device.
 *
 * @phpstan-type ActionShape = array{
 *   createCalendarEventAction?: CreateCalendarEventAction|null,
 *   dialAction?: DialAction|null,
 *   fallbackURL?: string|null,
 *   openURLAction?: OpenURLAction|null,
 *   postbackData?: string|null,
 *   shareLocationAction?: array<string,mixed>|null,
 *   text?: string|null,
 *   viewLocationAction?: ViewLocationAction|null,
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
     * @param CreateCalendarEventAction|array{
     *   description?: string|null,
     *   endTime?: \DateTimeInterface|null,
     *   startTime?: \DateTimeInterface|null,
     *   title?: string|null,
     * } $createCalendarEventAction
     * @param DialAction|array{phoneNumber: string} $dialAction
     * @param OpenURLAction|array{
     *   application: value-of<Application>,
     *   url: string,
     *   webviewViewMode: value-of<WebviewViewMode>,
     *   description?: string|null,
     * } $openURLAction
     * @param array<string,mixed> $shareLocationAction
     * @param ViewLocationAction|array{
     *   label?: string|null, latLong?: LatLong|null, query?: string|null
     * } $viewLocationAction
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
     * @param CreateCalendarEventAction|array{
     *   description?: string|null,
     *   endTime?: \DateTimeInterface|null,
     *   startTime?: \DateTimeInterface|null,
     *   title?: string|null,
     * } $createCalendarEventAction
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
     * @param DialAction|array{phoneNumber: string} $dialAction
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
     * @param OpenURLAction|array{
     *   application: value-of<Application>,
     *   url: string,
     *   webviewViewMode: value-of<WebviewViewMode>,
     *   description?: string|null,
     * } $openURLAction
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
     * @param ViewLocationAction|array{
     *   label?: string|null, latLong?: LatLong|null, query?: string|null
     * } $viewLocationAction
     */
    public function withViewLocationAction(
        ViewLocationAction|array $viewLocationAction
    ): self {
        $self = clone $this;
        $self['viewLocationAction'] = $viewLocationAction;

        return $self;
    }
}
