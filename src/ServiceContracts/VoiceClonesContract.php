<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceClones\VoiceCloneListParams\Sort;
use Telnyx\VoiceClones\VoiceCloneListResponse;
use Telnyx\VoiceClones\VoiceCloneNewFromDesignResponse;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse;
use Telnyx\VoiceClones\VoiceCloneUpdateParams\Gender;
use Telnyx\VoiceClones\VoiceCloneUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceClonesContract
{
    /**
     * @api
     *
     * @param string $id the voice clone UUID
     * @param string $name new name for the voice clone
     * @param Gender|value-of<Gender> $gender updated gender for the voice clone
     * @param string $language updated ISO 639-1 language code or `auto`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $name,
        Gender|string|null $gender = null,
        ?string $language = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneUpdateResponse;

    /**
     * @api
     *
     * @param string $filterName case-insensitive substring filter on the name field
     * @param int $pageNumber page number for pagination (1-based)
     * @param int $pageSize number of results per page
     * @param Sort|value-of<Sort> $sort Sort order. Prefix with `-` for descending. Defaults to `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VoiceCloneListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
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
     * @param \Telnyx\VoiceClones\VoiceCloneCreateFromDesignParams\Gender|value-of<\Telnyx\VoiceClones\VoiceCloneCreateFromDesignParams\Gender> $gender gender of the voice clone
     * @param string $language ISO 639-1 language code for the clone (e.g. `en`, `fr`, `de`).
     * @param string $name name for the voice clone
     * @param string $voiceDesignID UUID of the source voice design to clone
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createFromDesign(
        \Telnyx\VoiceClones\VoiceCloneCreateFromDesignParams\Gender|string $gender,
        string $language,
        string $name,
        string $voiceDesignID,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneNewFromDesignResponse;

    /**
     * @api
     *
     * @param string $audioFile Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 2MB.
     * @param string $language ISO 639-1 language code (e.g. `en`, `fr`) or `auto` for automatic detection.
     * @param string $name name for the voice clone
     * @param \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender|value-of<\Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender> $gender gender of the voice clone
     * @param string $label Optional custom label describing the voice style. If omitted, falls back to the source design's prompt text.
     * @param string $refText Optional transcript of the audio file. Providing this improves clone quality.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createFromUpload(
        string $audioFile,
        string $language,
        string $name,
        \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender|string|null $gender = null,
        ?string $label = null,
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
