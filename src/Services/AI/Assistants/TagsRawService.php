<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tags\TagAddParams;
use Telnyx\AI\Assistants\Tags\TagAddResponse;
use Telnyx\AI\Assistants\Tags\TagListResponse;
use Telnyx\AI\Assistants\Tags\TagRemoveParams;
use Telnyx\AI\Assistants\Tags\TagRemoveResponse;
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
     * Add Assistant Tag
     *
     * @param array{tag: string}|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $assistantID,
        array|TagAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/tags', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: TagAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove Assistant Tag
     *
     * @param array{assistantID: string}|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $tag,
        array|TagRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagRemoveParams::parseRequest(
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
            convert: TagRemoveResponse::class,
        );
    }
}
