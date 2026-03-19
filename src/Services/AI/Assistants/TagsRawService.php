<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tags\TagCreateParams;
use Telnyx\AI\Assistants\Tags\TagDeleteParams;
use Telnyx\AI\Assistants\Tags\TagDeleteResponse;
use Telnyx\AI\Assistants\Tags\TagListResponse;
use Telnyx\AI\Assistants\Tags\TagNewResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\TagsRawContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TagsRawService implements TagsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add Assistant Tag
     *
     * @param array{tag: string}|TagCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|TagCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/tags', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: TagNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get All Tags
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/assistants/tags',
            options: $requestOptions,
            convert: TagListResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove Assistant Tag
     *
     * @param array{assistantID: string}|TagDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $tag,
        array|TagDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/assistants/%1$s/tags/%2$s', $assistantID, $tag],
            options: $options,
            convert: TagDeleteResponse::class,
        );
    }
}
