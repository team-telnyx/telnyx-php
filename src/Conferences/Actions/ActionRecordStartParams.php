<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionRecordStartParams\Format;
use Telnyx\Conferences\Actions\ActionRecordStartParams\Region;
use Telnyx\Conferences\Actions\ActionRecordStartParams\Trim;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 * @see Telnyx\Services\Conferences\ActionsService::recordStart()
 *
 * @phpstan-type ActionRecordStartParamsShape = array{
 *   format: Format|value-of<Format>,
 *   command_id?: string,
 *   custom_file_name?: string,
 *   play_beep?: bool,
 *   region?: Region|value-of<Region>,
 *   trim?: Trim|value-of<Trim>,
 * }
 */
final class ActionRecordStartParams implements BaseModel
{
    /** @use SdkModel<ActionRecordStartParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The audio file format used when storing the conference recording. Can be either `mp3` or `wav`.
     *
     * @var value-of<Format> $format
     */
    #[Required(enum: Format::class)]
    public string $format;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `conference_id`.
     */
    #[Optional]
    public ?string $command_id;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Optional]
    public ?string $custom_file_name;

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    #[Optional]
    public ?bool $play_beep;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<Trim>|null $trim
     */
    #[Optional(enum: Trim::class)]
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
     * @param Region|value-of<Region> $region
     * @param Trim|value-of<Trim> $trim
     */
    public static function with(
        Format|string $format,
        ?string $command_id = null,
        ?string $custom_file_name = null,
        ?bool $play_beep = null,
        Region|string|null $region = null,
        Trim|string|null $trim = null,
    ): self {
        $obj = new self;

        $obj['format'] = $format;

        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $custom_file_name && $obj['custom_file_name'] = $custom_file_name;
        null !== $play_beep && $obj['play_beep'] = $play_beep;
        null !== $region && $obj['region'] = $region;
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
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withCustomFileName(string $customFileName): self
    {
        $obj = clone $this;
        $obj['custom_file_name'] = $customFileName;

        return $obj;
    }

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $obj = clone $this;
        $obj['play_beep'] = $playBeep;

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
