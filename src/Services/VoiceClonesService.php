<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VoiceClonesContract;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Provider;
use Telnyx\VoiceClones\VoiceCloneListParams\FilterProvider;
use Telnyx\VoiceClones\VoiceCloneListParams\Sort;
use Telnyx\VoiceClones\VoiceCloneListResponse;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse;
use Telnyx\VoiceClones\VoiceCloneNewResponse;
use Telnyx\VoiceClones\VoiceCloneUpdateResponse;

/**
 * Capture and manage voice identities as clones for use in text-to-speech synthesis.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceClonesService implements VoiceClonesContract
{
    /**
     * @api
     */
    public VoiceClonesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoiceClonesRawService($client);
    }

    /**
     * @api
     *
     * Creates a new voice clone by capturing the voice identity of an existing voice design. The clone can then be used for text-to-speech synthesis.
     *
     * @param Gender|value-of<Gender> $gender gender of the voice clone
     * @param string $language ISO 639-1 language code for the clone (e.g. `en`, `fr`, `de`).
     * @param string $name name for the voice clone
     * @param string $voiceDesignID UUID of the source voice design to clone
     * @param Provider|value-of<Provider> $provider Voice synthesis provider. Case-insensitive. Defaults to `telnyx`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Gender|string $gender,
        string $language,
        string $name,
        string $voiceDesignID,
        Provider|string $provider = 'telnyx',
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneNewResponse {
        $params = Util::removeNulls(
            [
                'gender' => $gender,
                'language' => $language,
                'name' => $name,
                'voiceDesignID' => $voiceDesignID,
                'provider' => $provider,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the name, language, or gender of a voice clone.
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
    ): VoiceCloneUpdateResponse {
        $params = Util::removeNulls(
            ['name' => $name, 'gender' => $gender, 'language' => $language]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of voice clones belonging to the authenticated account.
     *
     * @param string $filterName case-insensitive substring filter on the name field
     * @param FilterProvider|value-of<FilterProvider> $filterProvider Filter by voice synthesis provider. Case-insensitive.
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
        FilterProvider|string|null $filterProvider = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterName' => $filterName,
                'filterProvider' => $filterProvider,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a voice clone. This action cannot be undone.
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a new voice clone by uploading an audio file directly. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best results, provide 5–10 seconds of clear speech. Maximum file size: 2MB.
     *
     * @param string $audioFile Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 5MB for Telnyx, 20MB for Minimax.
     * @param string $language ISO 639-1 language code (e.g. `en`, `fr`) or `auto` for automatic detection.
     * @param string $name name for the voice clone
     * @param \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender|value-of<\Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender> $gender gender of the voice clone
     * @param string $label Optional custom label describing the voice style. If omitted, falls back to the source design's prompt text.
     * @param \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Provider|value-of<\Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Provider> $provider Voice synthesis provider. Case-insensitive. Defaults to `telnyx`.
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
        \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Provider|string $provider = 'telnyx',
        ?string $refText = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceCloneNewFromUploadResponse {
        $params = Util::removeNulls(
            [
                'audioFile' => $audioFile,
                'language' => $language,
                'name' => $name,
                'gender' => $gender,
                'label' => $label,
                'provider' => $provider,
                'refText' => $refText,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createFromUpload(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Downloads the WAV audio sample that was used to create the voice clone.
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->downloadSample($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
