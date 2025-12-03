<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsSuggestion\Action\CreateCalendarEventAction;
use Telnyx\Messsages\RcsSuggestion\Action\DialAction;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction;

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
    #[Api(optional: true)]
    public ?CreateCalendarEventAction $create_calendar_event_action;

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     */
    #[Api(optional: true)]
    public ?DialAction $dial_action;

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    #[Api(optional: true)]
    public ?string $fallback_url;

    /**
     * Opens the user's default web browser app to the specified URL.
     */
    #[Api(optional: true)]
    public ?OpenURLAction $open_url_action;

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    #[Api(optional: true)]
    public ?string $postback_data;

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     */
    #[Api(optional: true)]
    public mixed $share_location_action;

    /**
     * Text that is shown in the suggested action. Maximum 25 characters.
     */
    #[Api(optional: true)]
    public ?string $text;

    /**
     * Opens the user's default map app and selects the agent-specified location.
     */
    #[Api(optional: true)]
    public ?ViewLocationAction $view_location_action;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?CreateCalendarEventAction $create_calendar_event_action = null,
        ?DialAction $dial_action = null,
        ?string $fallback_url = null,
        ?OpenURLAction $open_url_action = null,
        ?string $postback_data = null,
        mixed $share_location_action = null,
        ?string $text = null,
        ?ViewLocationAction $view_location_action = null,
    ): self {
        $obj = new self;

        null !== $create_calendar_event_action && $obj->create_calendar_event_action = $create_calendar_event_action;
        null !== $dial_action && $obj->dial_action = $dial_action;
        null !== $fallback_url && $obj->fallback_url = $fallback_url;
        null !== $open_url_action && $obj->open_url_action = $open_url_action;
        null !== $postback_data && $obj->postback_data = $postback_data;
        null !== $share_location_action && $obj->share_location_action = $share_location_action;
        null !== $text && $obj->text = $text;
        null !== $view_location_action && $obj->view_location_action = $view_location_action;

        return $obj;
    }

    /**
     * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
     */
    public function withCreateCalendarEventAction(
        CreateCalendarEventAction $createCalendarEventAction
    ): self {
        $obj = clone $this;
        $obj->create_calendar_event_action = $createCalendarEventAction;

        return $obj;
    }

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     */
    public function withDialAction(DialAction $dialAction): self
    {
        $obj = clone $this;
        $obj->dial_action = $dialAction;

        return $obj;
    }

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $obj = clone $this;
        $obj->fallback_url = $fallbackURL;

        return $obj;
    }

    /**
     * Opens the user's default web browser app to the specified URL.
     */
    public function withOpenURLAction(OpenURLAction $openURLAction): self
    {
        $obj = clone $this;
        $obj->open_url_action = $openURLAction;

        return $obj;
    }

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    public function withPostbackData(string $postbackData): self
    {
        $obj = clone $this;
        $obj->postback_data = $postbackData;

        return $obj;
    }

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     */
    public function withShareLocationAction(mixed $shareLocationAction): self
    {
        $obj = clone $this;
        $obj->share_location_action = $shareLocationAction;

        return $obj;
    }

    /**
     * Text that is shown in the suggested action. Maximum 25 characters.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    /**
     * Opens the user's default map app and selects the agent-specified location.
     */
    public function withViewLocationAction(
        ViewLocationAction $viewLocationAction
    ): self {
        $obj = clone $this;
        $obj->view_location_action = $viewLocationAction;

        return $obj;
    }
}
