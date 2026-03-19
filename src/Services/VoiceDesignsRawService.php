<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VoiceDesignsRawContract;
use Telnyx\VoiceDesigns\VoiceDesignCreateParams;
use Telnyx\VoiceDesigns\VoiceDesignDeleteVersionParams;
use Telnyx\VoiceDesigns\VoiceDesignDownloadSampleParams;
use Telnyx\VoiceDesigns\VoiceDesignGetResponse;
use Telnyx\VoiceDesigns\VoiceDesignListParams;
use Telnyx\VoiceDesigns\VoiceDesignListParams\Sort;
use Telnyx\VoiceDesigns\VoiceDesignListResponse;
use Telnyx\VoiceDesigns\VoiceDesignNewResponse;
use Telnyx\VoiceDesigns\VoiceDesignRetrieveParams;
use Telnyx\VoiceDesigns\VoiceDesignUpdateParams;
use Telnyx\VoiceDesigns\VoiceDesignUpdateResponse;

/**
 * Create and manage AI-generated voice designs using natural language prompts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceDesignsRawService implements VoiceDesignsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new voice design (version 1) when `voice_design_id` is omitted. When `voice_design_id` is provided, adds a new version to the existing design instead. A design can have at most 50 versions.
     *
     * @param array{
     *   prompt: string,
     *   text: string,
     *   language?: string,
     *   maxNewTokens?: int,
     *   name?: string,
     *   repetitionPenalty?: float,
     *   temperature?: float,
     *   topK?: int,
     *   topP?: float,
     *   voiceDesignID?: string,
     * }|VoiceDesignCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDesignNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VoiceDesignCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceDesignCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'voice_designs',
            body: (object) $parsed,
            options: $options,
            convert: VoiceDesignNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the latest version of a voice design, or a specific version when `?version=N` is provided. The `id` parameter accepts either a UUID or the design name.
     *
     * @param string $id the voice design UUID or name
     * @param array{version?: int}|VoiceDesignRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDesignGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|VoiceDesignRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceDesignRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['voice_designs/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: VoiceDesignGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the name of a voice design. All versions retain their other properties.
     *
     * @param string $id the voice design UUID or name
     * @param array{name: string}|VoiceDesignUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDesignUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VoiceDesignUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceDesignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['voice_designs/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: VoiceDesignUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of voice designs belonging to the authenticated account.
     *
     * @param array{
     *   filterName?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|VoiceDesignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VoiceDesignListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceDesignListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceDesignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'voice_designs',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterName' => 'filter[name]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: VoiceDesignListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a voice design and all of its versions. This action cannot be undone.
     *
     * @param string $id the voice design UUID or name
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
            path: ['voice_designs/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a specific version of a voice design. The version number must be a positive integer.
     *
     * @param int $version the version number to delete
     * @param array{id: string}|VoiceDesignDeleteVersionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $version,
        array|VoiceDesignDeleteVersionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceDesignDeleteVersionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['voice_designs/%1$s/versions/%2$s', $id, $version],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Downloads the WAV audio sample for the voice design. Returns the latest version's sample by default, or a specific version when `?version=N` is provided. The `id` parameter accepts either a UUID or the design name.
     *
     * @param string $id the voice design UUID or name
     * @param array{version?: int}|VoiceDesignDownloadSampleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function downloadSample(
        string $id,
        array|VoiceDesignDownloadSampleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceDesignDownloadSampleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['voice_designs/%1$s/sample', $id],
            query: $parsed,
            headers: ['Accept' => 'audio/wav'],
            options: $options,
            convert: 'string',
        );
    }
}
