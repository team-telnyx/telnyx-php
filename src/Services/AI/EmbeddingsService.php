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
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\EmbeddingsContract;
use Telnyx\Services\AI\Embeddings\BucketsService;

use const Telnyx\Core\OMIT as omit;

final class EmbeddingsService implements EmbeddingsContract
{
    /**
     * @@api
     */
    public BucketsService $buckets;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->buckets = new BucketsService($this->client);
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
     * @param string $bucketName
     * @param int $documentChunkOverlapSize
     * @param int $documentChunkSize
     * @param EmbeddingModel|value-of<EmbeddingModel> $embeddingModel supported models to vectorize and embed documents
     * @param Loader|value-of<Loader> $loader supported types of custom document loaders for embeddings
     */
    public function create(
        $bucketName,
        $documentChunkOverlapSize = omit,
        $documentChunkSize = omit,
        $embeddingModel = omit,
        $loader = omit,
        ?RequestOptions $requestOptions = null,
    ): EmbeddingResponse {
        [$parsed, $options] = EmbeddingCreateParams::parseRequest(
            [
                'bucketName' => $bucketName,
                'documentChunkOverlapSize' => $documentChunkOverlapSize,
                'documentChunkSize' => $documentChunkSize,
                'embeddingModel' => $embeddingModel,
                'loader' => $loader,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): EmbeddingGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param list<string> $status List of task statuses i.e. `status=queued&status=processing`
     */
    public function list(
        $status = omit,
        ?RequestOptions $requestOptions = null
    ): EmbeddingListResponse {
        [$parsed, $options] = EmbeddingListParams::parseRequest(
            ['status' => $status],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $bucketName
     * @param string $query
     * @param int $numOfDocs
     */
    public function similaritySearch(
        $bucketName,
        $query,
        $numOfDocs = omit,
        ?RequestOptions $requestOptions = null,
    ): EmbeddingSimilaritySearchResponse {
        [$parsed, $options] = EmbeddingSimilaritySearchParams::parseRequest(
            [
                'bucketName' => $bucketName,
                'query' => $query,
                'numOfDocs' => $numOfDocs,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param string $bucketName Name of the bucket to store the embeddings. This bucket must already exist.
     * @param string $url The URL of the webpage to embed
     */
    public function url(
        $bucketName,
        $url,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse {
        [$parsed, $options] = EmbeddingURLParams::parseRequest(
            ['bucketName' => $bucketName, 'url' => $url],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/embeddings/url',
            body: (object) $parsed,
            options: $options,
            convert: EmbeddingResponse::class,
        );
    }
}
