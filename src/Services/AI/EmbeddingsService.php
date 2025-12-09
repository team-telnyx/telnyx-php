<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Embeddings\EmbeddingCreateParams\EmbeddingModel;
use Telnyx\AI\Embeddings\EmbeddingCreateParams\Loader;
use Telnyx\AI\Embeddings\EmbeddingGetResponse;
use Telnyx\AI\Embeddings\EmbeddingListResponse;
use Telnyx\AI\Embeddings\EmbeddingResponse;
use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\EmbeddingsContract;
use Telnyx\Services\AI\Embeddings\BucketsService;

final class EmbeddingsService implements EmbeddingsContract
{
    /**
     * @api
     */
    public EmbeddingsRawService $raw;

    /**
     * @api
     */
    public BucketsService $buckets;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmbeddingsRawService($client);
        $this->buckets = new BucketsService($client);
    }

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
     * @param 'thenlper/gte-large'|'intfloat/multilingual-e5-large'|EmbeddingModel $embeddingModel supported models to vectorize and embed documents
     * @param 'default'|'intercom'|Loader $loader supported types of custom document loaders for embeddings
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        int $documentChunkOverlapSize = 512,
        int $documentChunkSize = 1024,
        string|EmbeddingModel $embeddingModel = 'thenlper/gte-large',
        string|Loader $loader = 'default',
        ?RequestOptions $requestOptions = null,
    ): EmbeddingResponse {
        $params = [
            'bucketName' => $bucketName,
            'documentChunkOverlapSize' => $documentChunkOverlapSize,
            'documentChunkSize' => $documentChunkSize,
            'embeddingModel' => $embeddingModel,
            'loader' => $loader,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): EmbeddingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve tasks for the user that are either `queued`, `processing`, `failed`, `success` or `partial_success` based on the query string. Defaults to `queued` and `processing`.
     *
     * @param list<string> $status List of task statuses i.e. `status=queued&status=processing`
     *
     * @throws APIException
     */
    public function list(
        array $status = ['processing', 'queued'],
        ?RequestOptions $requestOptions = null,
    ): EmbeddingListResponse {
        $params = ['status' => $status];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function similaritySearch(
        string $bucketName,
        string $query,
        int $numOfDocs = 3,
        ?RequestOptions $requestOptions = null,
    ): EmbeddingSimilaritySearchResponse {
        $params = [
            'bucketName' => $bucketName, 'query' => $query, 'numOfDocs' => $numOfDocs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->similaritySearch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Embed website content from a specified URL, including child pages up to 5 levels deep within the same domain. The process crawls and loads content from the main URL and its linked pages into a Telnyx Cloud Storage bucket. As soon as each webpage is added to the bucket, its content is immediately processed for embeddings, that can be used for [similarity search](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding-similarity-search) and [clustering](https://developers.telnyx.com/docs/inference/clusters).
     *
     * @param string $bucketName Name of the bucket to store the embeddings. This bucket must already exist.
     * @param string $url The URL of the webpage to embed
     *
     * @throws APIException
     */
    public function url(
        string $bucketName,
        string $url,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse {
        $params = ['bucketName' => $bucketName, 'url' => $url];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->url(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
