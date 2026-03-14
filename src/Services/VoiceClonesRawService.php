<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VoiceClonesRawContract;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams;
use Telnyx\VoiceClones\VoiceCloneCreateParams;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Gender;
use Telnyx\VoiceClones\VoiceCloneData;
use Telnyx\VoiceClones\VoiceCloneListParams;
use Telnyx\VoiceClones\VoiceCloneListParams\Sort;
use Telnyx\VoiceClones\VoiceCloneNewFromUploadResponse;
use Telnyx\VoiceClones\VoiceCloneNewResponse;
use Telnyx\VoiceClones\VoiceCloneUpdateParams;
use Telnyx\VoiceClones\VoiceCloneUpdateResponse;

/**
 * Capture and manage voice identities as clones for use in text-to-speech synthesis.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceClonesRawService implements VoiceClonesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new voice clone by capturing the voice identity of an existing voice design. The clone can then be used for text-to-speech synthesis.
     *
     * @param array{
     *   gender: Gender|value-of<Gender>,
     *   language: string,
     *   name: string,
     *   voiceDesignID: string,
     * }|VoiceCloneCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceCloneNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VoiceCloneCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceCloneCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'voice_clones',
            body: (object) $parsed,
            options: $options,
            convert: VoiceCloneNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the name, language, or gender of a voice clone.
     *
     * @param string $id the voice clone UUID
     * @param array{
     *   name: string,
     *   gender?: VoiceCloneUpdateParams\Gender|value-of<VoiceCloneUpdateParams\Gender>,
     *   language?: string,
     * }|VoiceCloneUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceCloneUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VoiceCloneUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceCloneUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['voice_clones/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: VoiceCloneUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of voice clones belonging to the authenticated account.
     *
     * @param array{
     *   filterName?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|VoiceCloneListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VoiceCloneData>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceCloneListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceCloneListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'voice_clones',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterName' => 'filter[name]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: VoiceCloneData::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a voice clone. This action cannot be undone.
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['voice_clones/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Creates a new voice clone by uploading an audio file directly. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best results, provide 5–10 seconds of clear speech. Maximum file size: 2MB.
     *
     * @param array{
     *   audioFile: string,
     *   language: string,
     *   name: string,
     *   gender?: VoiceCloneCreateFromUploadParams\Gender|value-of<VoiceCloneCreateFromUploadParams\Gender>,
     *   label?: string,
     *   refText?: string,
     * }|VoiceCloneCreateFromUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceCloneNewFromUploadResponse>
     *
     * @throws APIException
     */
    public function createFromUpload(
        array|VoiceCloneCreateFromUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceCloneCreateFromUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'voice_clones/from_upload',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: VoiceCloneNewFromUploadResponse::class,
        );
    }

    /**
     * @api
     *
     * Downloads the WAV audio sample that was used to create the voice clone.
     *
     * @param string $id the voice clone UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['voice_clones/%1$s/sample', $id],
            headers: ['Accept' => 'audio/wav'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
