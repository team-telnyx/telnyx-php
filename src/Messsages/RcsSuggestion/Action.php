<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsSuggestion\Action\CreateCalendarEventAction;
use Telnyx\Messsages\RcsSuggestion\Action\DialAction;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction\Application;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction\WebviewViewMode;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction\LatLong;

/**
 * When tapped, initiates the corresponding native action on the device.
 *
 * @phpstan-type ActionShape = array{
 *   create_calendar_event_action?: CreateCalendarEventAction|null,
 *   dial_action?: DialAction|null,
 *   fallback_url?: string|null,
 *   open_url_action?: OpenURLAction|null,
 *   postback_data?: string|null,
 *   share_location_action?: mixed,
 *   text?: string|null,
 *   view_location_action?: ViewLocationAction|null,
 * }
 */
final class Action implements BaseModel
{
    /** @use SdkModel<ActionShape> */
    use SdkModel;

    /**
     * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
     */
    #[Optional]
    public ?CreateCalendarEventAction $create_calendar_event_action;

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     */
    #[Optional]
    public ?DialAction $dial_action;

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    #[Optional]
    public ?string $fallback_url;

    /**
     * Opens the user's default web browser app to the specified URL.
     */
    #[Optional]
    public ?OpenURLAction $open_url_action;

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    #[Optional]
    public ?string $postback_data;

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     */
    #[Optional]
    public mixed $share_location_action;

    /**
     * Text that is shown in the suggested action. Maximum 25 characters.
     */
    #[Optional]
    public ?string $text;

    /**
     * Opens the user's default map app and selects the agent-specified location.
     */
    #[Optional]
    public ?ViewLocationAction $view_location_action;

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
     *   end_time?: \DateTimeInterface|null,
     *   start_time?: \DateTimeInterface|null,
     *   title?: string|null,
     * } $create_calendar_event_action
     * @param DialAction|array{phone_number: string} $dial_action
     * @param OpenURLAction|array{
     *   application: value-of<Application>,
     *   url: string,
     *   webview_view_mode: value-of<WebviewViewMode>,
     *   description?: string|null,
     * } $open_url_action
     * @param ViewLocationAction|array{
     *   label?: string|null, lat_long?: LatLong|null, query?: string|null
     * } $view_location_action
     */
    public static function with(
        CreateCalendarEventAction|array|null $create_calendar_event_action = null,
        DialAction|array|null $dial_action = null,
        ?string $fallback_url = null,
        OpenURLAction|array|null $open_url_action = null,
        ?string $postback_data = null,
        mixed $share_location_action = null,
        ?string $text = null,
        ViewLocationAction|array|null $view_location_action = null,
    ): self {
        $obj = new self;

        null !== $create_calendar_event_action && $obj['create_calendar_event_action'] = $create_calendar_event_action;
        null !== $dial_action && $obj['dial_action'] = $dial_action;
        null !== $fallback_url && $obj['fallback_url'] = $fallback_url;
        null !== $open_url_action && $obj['open_url_action'] = $open_url_action;
        null !== $postback_data && $obj['postback_data'] = $postback_data;
        null !== $share_location_action && $obj['share_location_action'] = $share_location_action;
        null !== $text && $obj['text'] = $text;
        null !== $view_location_action && $obj['view_location_action'] = $view_location_action;

        return $obj;
    }

    /**
     * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
     *
     * @param CreateCalendarEventAction|array{
     *   description?: string|null,
     *   end_time?: \DateTimeInterface|null,
     *   start_time?: \DateTimeInterface|null,
     *   title?: string|null,
     * } $createCalendarEventAction
     */
    public function withCreateCalendarEventAction(
        CreateCalendarEventAction|array $createCalendarEventAction
    ): self {
        $obj = clone $this;
        $obj['create_calendar_event_action'] = $createCalendarEventAction;

        return $obj;
    }

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     *
     * @param DialAction|array{phone_number: string} $dialAction
     */
    public function withDialAction(DialAction|array $dialAction): self
    {
        $obj = clone $this;
        $obj['dial_action'] = $dialAction;

        return $obj;
    }

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $obj = clone $this;
        $obj['fallback_url'] = $fallbackURL;

        return $obj;
    }

    /**
     * Opens the user's default web browser app to the specified URL.
     *
     * @param OpenURLAction|array{
     *   application: value-of<Application>,
     *   url: string,
     *   webview_view_mode: value-of<WebviewViewMode>,
     *   description?: string|null,
     * } $openURLAction
     */
    public function withOpenURLAction(OpenURLAction|array $openURLAction): self
    {
        $obj = clone $this;
        $obj['open_url_action'] = $openURLAction;

        return $obj;
    }

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    public function withPostbackData(string $postbackData): self
    {
        $obj = clone $this;
        $obj['postback_data'] = $postbackData;

        return $obj;
    }

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     */
    public function withShareLocationAction(mixed $shareLocationAction): self
    {
        $obj = clone $this;
        $obj['share_location_action'] = $shareLocationAction;

        return $obj;
    }

    /**
     * Text that is shown in the suggested action. Maximum 25 characters.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }

    /**
     * Opens the user's default map app and selects the agent-specified location.
     *
     * @param ViewLocationAction|array{
     *   label?: string|null, lat_long?: LatLong|null, query?: string|null
     * } $viewLocationAction
     */
    public function withViewLocationAction(
        ViewLocationAction|array $viewLocationAction
    ): self {
        $obj = clone $this;
        $obj['view_location_action'] = $viewLocationAction;

        return $obj;
    }
}
