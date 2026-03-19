<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tags\TagDeleteResponse;
use Telnyx\AI\Assistants\Tags\TagListResponse;
use Telnyx\AI\Assistants\Tags\TagNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\TagsContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TagsService implements TagsContract
{
    /**
     * @api
     */
    public TagsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TagsRawService($client);
    }

    /**
     * @api
     *
     * Add Assistant Tag
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        string $tag,
        RequestOptions|array|null $requestOptions = null,
    ): TagNewResponse {
        $params = Util::removeNulls(['tag' => $tag]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get All Tags
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): TagListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove Assistant Tag
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $tag,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): TagDeleteResponse {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($tag, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
