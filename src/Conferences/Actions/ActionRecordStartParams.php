<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionRecordStartParams\Format;
use Telnyx\Conferences\Actions\ActionRecordStartParams\Trim;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start recording the conference. Recording will stop on conference end, or via the Stop Recording command.
 *
 * **Expected Webhooks:**
 *
 * - `conference.recording.saved`
 *
 * @see Telnyx\Conferences\Actions->recordStart
 *
 * @phpstan-type action_record_start_params = array{
 *   format: Format|value-of<Format>,
 *   commandID?: string,
 *   customFileName?: string,
 *   playBeep?: bool,
 *   trim?: Trim|value-of<Trim>,
 * }
 */
final class ActionRecordStartParams implements BaseModel
{
    /** @use SdkModel<action_record_start_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The audio file format used when storing the conference recording. Can be either `mp3` or `wav`.
     *
     * @var value-of<Format> $format
     */
    #[Api(enum: Format::class)]
    public string $format;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `conference_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Api('custom_file_name', optional: true)]
    public ?string $customFileName;

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    #[Api('play_beep', optional: true)]
    public ?bool $playBeep;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<Trim>|null $trim
     */
    #[Api(enum: Trim::class, optional: true)]
    public ?string $trim;

    /**
     * `new ActionRecordStartParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionRecordStartParams::with(format: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionRecordStartParams)->withFormat(...)
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
     * @param Format|value-of<Format> $format
     * @param Trim|value-of<Trim> $trim
     */
    public static function with(
        Format|string $format,
        ?string $commandID = null,
        ?string $customFileName = null,
        ?bool $playBeep = null,
        Trim|string|null $trim = null,
    ): self {
        $obj = new self;

        $obj['format'] = $format;

        null !== $commandID && $obj->commandID = $commandID;
        null !== $customFileName && $obj->customFileName = $customFileName;
        null !== $playBeep && $obj->playBeep = $playBeep;
        null !== $trim && $obj['trim'] = $trim;

        return $obj;
    }

    /**
     * The audio file format used when storing the conference recording. Can be either `mp3` or `wav`.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `conference_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withCustomFileName(string $customFileName): self
    {
        $obj = clone $this;
        $obj->customFileName = $customFileName;

        return $obj;
    }

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $obj = clone $this;
        $obj->playBeep = $playBeep;

        return $obj;
    }

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(Trim|string $trim): self
    {
        $obj = clone $this;
        $obj['trim'] = $trim;

        return $obj;
    }
}
