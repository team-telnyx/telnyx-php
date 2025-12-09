<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Embeddings\EmbeddingCreateParams;
use Telnyx\AI\Embeddings\EmbeddingCreateParams\EmbeddingModel;
use Telnyx\AI\Embeddings\EmbeddingCreateParams\Loader;
use Telnyx\AI\Embeddings\EmbeddingGetResponse;
use Telnyx\AI\Embeddings\EmbeddingListParams;
use Telnyx\AI\Embeddings\EmbeddingListResponse;
use Telnyx\AI\Embeddings\EmbeddingResponse;
use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchParams;
use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse;
use Telnyx\AI\Embeddings\EmbeddingURLParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\EmbeddingsRawContract;

final class EmbeddingsRawService implements EmbeddingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Perform embedding on a Telnyx Storage Bucket using the a embedding model.
     * The current supported file types are:
     * - PDF
     * - HTML
     * - txt/unstructured text files
     * - json
     * - csv
     * - audio / video (mp3, mp4, mpeg, mpga, m4a, wav, or webm ) - Max of 100mb file size.
     *
     * Any files not matching the above types will be attempted to be embedded as unstructured text.
     *
     * This process can be slow, so it runs in the background and the user can check
     * the status of the task using the endpoint `/ai/embeddings/{task_id}`.
     *
     *  **Important Note**: When you update documents in a Telnyx Storage bucket, their associated embeddings are automatically kept up to date. If you add or update a file, it is automatically embedded. If you delete a file, the embeddings are deleted for that particular file.
     *
     * You can also specify a custom `loader` param. Currently the only supported loader value is
     * `intercom` which loads Intercom article jsons as specified by [the Intercom article API](https://developers.intercom.com/docs/references/rest-api/api.intercom.io/Articles/article/)
     * This loader will split each article into paragraphs and save additional parameters relevant to Intercom docs, such as
     * `article_url` and `heading`. These values will be returned by the `/v2/ai/embeddings/similarity-search` endpoint in the `loader_metadata` field.
     *
     * @param array{
     *   bucketName: string,
     *   documentChunkOverlapSize?: int,
     *   documentChunkSize?: int,
     *   embeddingModel?: 'thenlper/gte-large'|'intfloat/multilingual-e5-large'|EmbeddingModel,
     *   loader?: 'default'|'intercom'|Loader,
     * }|EmbeddingCreateParams $params
     *
     * @return BaseResponse<EmbeddingResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmbeddingCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EmbeddingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/embeddings',
            body: (object) $parsed,
            options: $options,
            convert: EmbeddingResponse::class,
        );
    }

    /**
     * @api
     *
     * Check the status of a current embedding task. Will be one of the following:
     * - `queued` - Task is waiting to be picked up by a worker
     * - `processing` - The embedding task is running
     * - `success` - Task completed successfully and the bucket is embedded
     * - `failure` - Task failed and no files were embedded successfully
     * - `partial_success` - Some files were embedded successfully, but at least one failed
     *
     * @return BaseResponse<EmbeddingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/embeddings/%1$s', $taskID],
            options: $requestOptions,
            convert: EmbeddingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve tasks for the user that are either `queued`, `processing`, `failed`, `success` or `partial_success` based on the query string. Defaults to `queued` and `processing`.
     *
     * @param array{status?: list<string>}|EmbeddingListParams $params
     *
     * @return BaseResponse<EmbeddingListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmbeddingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EmbeddingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/embeddings',
            query: $parsed,
            options: $options,
            convert: EmbeddingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Perform a similarity search on a Telnyx Storage Bucket, returning the most similar `num_docs` document chunks to the query.
     *
     * Currently the only available distance metric is cosine similarity which will return a `distance` between 0 and 1.
     * The lower the distance, the more similar the returned document chunks are to the query.
     * A `certainty` will also be returned, which is a value between 0 and 1 where the higher the certainty, the more similar the document.
     * You can read more about Weaviate distance metrics here: [Weaviate Docs](https://weaviate.io/developers/weaviate/config-refs/distances)
     *
     * If a bucket was embedded using a custom loader, such as `intercom`, the additional metadata will be returned in the
     * `loader_metadata` field.
     *
     * @param array{
     *   bucketName: string, query: string, numOfDocs?: int
     * }|EmbeddingSimilaritySearchParams $params
     *
     * @return BaseResponse<EmbeddingSimilaritySearchResponse>
     *
     * @throws APIException
     */
    public function similaritySearch(
        array|EmbeddingSimilaritySearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmbeddingSimilaritySearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/embeddings/similarity-search',
            body: (object) $parsed,
            options: $options,
            convert: EmbeddingSimilaritySearchResponse::class,
        );
    }

    /**
     * @api
     *
     * Embed website content from a specified URL, including child pages up to 5 levels deep within the same domain. The process crawls and loads content from the main URL and its linked pages into a Telnyx Cloud Storage bucket. As soon as each webpage is added to the bucket, its content is immediately processed for embeddings, that can be used for [similarity search](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding-similarity-search) and [clustering](https://developers.telnyx.com/docs/inference/clusters).
     *
     * @param array{bucketName: string, url: string}|EmbeddingURLParams $params
     *
     * @return BaseResponse<EmbeddingResponse>
     *
     * @throws APIException
     */
    public function url(
        array|EmbeddingURLParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EmbeddingURLParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/embeddings/url',
            body: (object) $parsed,
            options: $options,
            convert: EmbeddingResponse::class,
        );
    }
}
