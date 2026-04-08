<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\ModelID;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Provider;
use Telnyx\VoiceClones\VoiceCloneData;
use Telnyx\VoiceClones\VoiceCloneListParams\FilterProvider;
use Telnyx\VoiceClones\VoiceCloneListParams\Sort;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse;
use Telnyx\VoiceClones\VoiceCloneNewResponse;
use Telnyx\VoiceClones\VoiceCloneUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceClonesContract
{
    /**
     * @api
     *
     * @param Gender|value-of<Gender> $gender gender of the voice clone
     * @param string $language ISO 639-1 language code for the clone. Supports the Minimax language set.
     * @param string $name name for the voice clone
     * @param string $voiceDesignID UUID of the source voice design to clone
     * @param Provider|value-of<Provider> $provider Voice synthesis provider. Must be `minimax`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Gender|string $gender,
        string $language,
        string $name,
        string $voiceDesignID,
        Provider|string $provider,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneNewResponse;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param string $name new name for the voice clone
     * @param \Telnyx\VoiceClones\VoiceCloneUpdateParams\Gender|value-of<\Telnyx\VoiceClones\VoiceCloneUpdateParams\Gender> $gender updated gender for the voice clone
     * @param string $language updated ISO 639-1 language code or `auto`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $name,
        \Telnyx\VoiceClones\VoiceCloneUpdateParams\Gender|string|null $gender = null,
        ?string $language = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneUpdateResponse;

    /**
     * @api
     *
     * @param string $filterName case-insensitive substring filter on the name field
     * @param FilterProvider|value-of<FilterProvider> $filterProvider Filter by voice synthesis provider. Case-insensitive.
     * @param int $pageNumber page number for pagination (1-based)
     * @param int $pageSize number of results per page
     * @param Sort|value-of<Sort> $sort Sort order. Prefix with `-` for descending. Defaults to `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VoiceCloneData>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        FilterProvider|string|null $filterProvider = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $audioFile Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 20MB.
     * @param \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender|value-of<\Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender> $gender gender of the voice clone
     * @param string $language ISO 639-1 language code from the Minimax language set
     * @param string $name name for the voice clone
     * @param \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Provider|value-of<\Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Provider> $provider Voice synthesis provider. Must be `minimax`.
     * @param string $label optional custom label describing the voice style
     * @param ModelID|value-of<ModelID>|null $modelID TTS model identifier. Nullable — defaults to speech-2.8-turbo.
     * @param string $refText Optional transcript of the audio file. Providing this improves clone quality.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createFromUpload(
        string $audioFile,
        \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender|string $gender,
        string $language,
        string $name,
        \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Provider|string $provider,
        ?string $label = null,
        ModelID|string|null $modelID = null,
        ?string $refText = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneNewFromUploadResponse;

    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string;
}
