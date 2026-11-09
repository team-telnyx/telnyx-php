<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Set an individual meeting override: true opts in, false opts out, null follows the connection policy. A supported meeting link is required. Changes re-evaluate the meeting immediately; poll the linked session for its final lifecycle outcome.
 *
 * @see Telnyx\Services\CalendarConnections\MeetingsService::update()
 *
 * @phpstan-type MeetingUpdateParamsShape = array{
 *   id: string, botWillJoin: bool|null
 * }
 */
final class MeetingUpdateParams implements BaseModel
{
    /** @use SdkModel<MeetingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * True opts in, false opts out, null follows connection policy. A supported meeting URL is still required.
     */
    #[Required('bot_will_join')]
    public ?bool $botWillJoin;

    /**
     * `new MeetingUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingUpdateParams::with(id: ..., botWillJoin: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingUpdateParams)->withID(...)->withBotWillJoin(...)
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
     */
    public static function with(string $id, ?bool $botWillJoin): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['botWillJoin'] = $botWillJoin;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * True opts in, false opts out, null follows connection policy. A supported meeting URL is still required.
     */
    public function withBotWillJoin(?bool $botWillJoin): self
    {
        $self = clone $this;
        $self['botWillJoin'] = $botWillJoin;

        return $self;
    }
}
