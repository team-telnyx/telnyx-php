<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionRecordStopParams\Region;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Stop recording the conference.
 *
 * **Expected Webhooks:**
 *
 * - `conference.recording.saved`
 *
 * @see Telnyx\Conferences\Actions->recordStop
 *
 * @phpstan-type ActionRecordStopParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   recording_id?: string,
 *   region?: Region|value-of<Region>,
 * }
 */
final class ActionRecordStopParams implements BaseModel
{
    /** @use SdkModel<ActionRecordStopParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $recording_id;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Api(enum: Region::class, optional: true)]
    public ?string $region;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Region|value-of<Region> $region
     */
    public static function with(
        ?string $client_state = null,
        ?string $command_id = null,
        ?string $recording_id = null,
        Region|string|null $region = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $recording_id && $obj->recording_id = $recording_id;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recording_id = $recordingID;

        return $obj;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }
}
