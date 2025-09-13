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
 * @phpstan-type action_alias = array{
 *   createCalendarEventAction?: CreateCalendarEventAction,
 *   dialAction?: DialAction,
 *   fallbackURL?: string,
 *   openURLAction?: OpenURLAction,
 *   postbackData?: string,
 *   shareLocationAction?: mixed,
 *   text?: string,
 *   viewLocationAction?: ViewLocationAction,
 * }
 */
final class Action implements BaseModel
{
    /** @use SdkModel<action_alias> */
    use SdkModel;

    /**
     * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
     */
    #[Api('create_calendar_event_action', optional: true)]
    public ?CreateCalendarEventAction $createCalendarEventAction;

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     */
    #[Api('dial_action', optional: true)]
    public ?DialAction $dialAction;

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    #[Api('fallback_url', optional: true)]
    public ?string $fallbackURL;

    /**
     * Opens the user's default web browser app to the specified URL.
     */
    #[Api('open_url_action', optional: true)]
    public ?OpenURLAction $openURLAction;

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    #[Api('postback_data', optional: true)]
    public ?string $postbackData;

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     */
    #[Api('share_location_action', optional: true)]
    public mixed $shareLocationAction;

    /**
     * Text that is shown in the suggested action. Maximum 25 characters.
     */
    #[Api(optional: true)]
    public ?string $text;

    /**
     * Opens the user's default map app and selects the agent-specified location.
     */
    #[Api('view_location_action', optional: true)]
    public ?ViewLocationAction $viewLocationAction;

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
        ?CreateCalendarEventAction $createCalendarEventAction = null,
        ?DialAction $dialAction = null,
        ?string $fallbackURL = null,
        ?OpenURLAction $openURLAction = null,
        ?string $postbackData = null,
        mixed $shareLocationAction = null,
        ?string $text = null,
        ?ViewLocationAction $viewLocationAction = null,
    ): self {
        $obj = new self;

        null !== $createCalendarEventAction && $obj->createCalendarEventAction = $createCalendarEventAction;
        null !== $dialAction && $obj->dialAction = $dialAction;
        null !== $fallbackURL && $obj->fallbackURL = $fallbackURL;
        null !== $openURLAction && $obj->openURLAction = $openURLAction;
        null !== $postbackData && $obj->postbackData = $postbackData;
        null !== $shareLocationAction && $obj->shareLocationAction = $shareLocationAction;
        null !== $text && $obj->text = $text;
        null !== $viewLocationAction && $obj->viewLocationAction = $viewLocationAction;

        return $obj;
    }

    /**
     * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
     */
    public function withCreateCalendarEventAction(
        CreateCalendarEventAction $createCalendarEventAction
    ): self {
        $obj = clone $this;
        $obj->createCalendarEventAction = $createCalendarEventAction;

        return $obj;
    }

    /**
     * Opens the user's default dialer app with the agent-specified phone number filled in.
     */
    public function withDialAction(DialAction $dialAction): self
    {
        $obj = clone $this;
        $obj->dialAction = $dialAction;

        return $obj;
    }

    /**
     * Fallback URL to use if a client doesn't support a suggested action. Fallback URLs open in new browser windows. Maximum 2048 characters.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $obj = clone $this;
        $obj->fallbackURL = $fallbackURL;

        return $obj;
    }

    /**
     * Opens the user's default web browser app to the specified URL.
     */
    public function withOpenURLAction(OpenURLAction $openURLAction): self
    {
        $obj = clone $this;
        $obj->openURLAction = $openURLAction;

        return $obj;
    }

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    public function withPostbackData(string $postbackData): self
    {
        $obj = clone $this;
        $obj->postbackData = $postbackData;

        return $obj;
    }

    /**
     * Opens the RCS app's location chooser so the user can pick a location to send back to the agent.
     */
    public function withShareLocationAction(mixed $shareLocationAction): self
    {
        $obj = clone $this;
        $obj->shareLocationAction = $shareLocationAction;

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
        $obj->viewLocationAction = $viewLocationAction;

        return $obj;
    }
}
