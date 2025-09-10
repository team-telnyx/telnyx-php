<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionHoldParams); // set properties as needed
 * $client->conferences.actions->hold(...$params->toArray());
 * ```
 * Hold a list of participants in a conference call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conferences.actions->hold(...$params->toArray());`
 *
 * @see Telnyx\Conferences\Actions->hold
 *
 * @phpstan-type action_hold_params = array{
 *   audioURL?: string, callControlIDs?: list<string>, mediaName?: string
 * }
 */
final class ActionHoldParams implements BaseModel
{
    /** @use SdkModel<action_hold_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     */
    #[Api('audio_url', optional: true)]
    public ?string $audioURL;

    /**
     * List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Api('call_control_ids', list: 'string', optional: true)]
    public ?array $callControlIDs;

    /**
     * The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $callControlIDs
     */
    public static function with(
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        ?string $mediaName = null,
    ): self {
        $obj = new self;

        null !== $audioURL && $obj->audioURL = $audioURL;
        null !== $callControlIDs && $obj->callControlIDs = $callControlIDs;
        null !== $mediaName && $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audioURL = $audioURL;

        return $obj;
    }

    /**
     * List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
     *
     * @param list<string> $callControlIDs
     */
    public function withCallControlIDs(array $callControlIDs): self
    {
        $obj = clone $this;
        $obj->callControlIDs = $callControlIDs;

        return $obj;
    }

    /**
     * The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }
}
