<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\AI\Embeddings\EmbeddingCreateParams\EmbeddingModel;
use Telnyx\AI\Embeddings\EmbeddingCreateParams\Loader;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmbeddingCreateParams); // set properties as needed
 * $client->ai.embeddings->create(...$params->toArray());
 * ```
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
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.embeddings->create(...$params->toArray());`
 *
 * @see Telnyx\AI\Embeddings->create
 *
 * @phpstan-type embedding_create_params = array{
 *   bucketName: string,
 *   documentChunkOverlapSize?: int,
 *   documentChunkSize?: int,
 *   embeddingModel?: EmbeddingModel|value-of<EmbeddingModel>,
 *   loader?: Loader|value-of<Loader>,
 * }
 */
final class EmbeddingCreateParams implements BaseModel
{
    /** @use SdkModel<embedding_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('bucket_name')]
    public string $bucketName;

    #[Api('document_chunk_overlap_size', optional: true)]
    public ?int $documentChunkOverlapSize;

    #[Api('document_chunk_size', optional: true)]
    public ?int $documentChunkSize;

    /**
     * Supported models to vectorize and embed documents.
     *
     * @var value-of<EmbeddingModel>|null $embeddingModel
     */
    #[Api('embedding_model', enum: EmbeddingModel::class, optional: true)]
    public ?string $embeddingModel;

    /**
     * Supported types of custom document loaders for embeddings.
     *
     * @var value-of<Loader>|null $loader
     */
    #[Api(enum: Loader::class, optional: true)]
    public ?string $loader;

    /**
     * `new EmbeddingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingCreateParams::with(bucketName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingCreateParams)->withBucketName(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EmbeddingModel|value-of<EmbeddingModel> $embeddingModel
     * @param Loader|value-of<Loader> $loader
     */
    public static function with(
        string $bucketName,
        ?int $documentChunkOverlapSize = null,
        ?int $documentChunkSize = null,
        EmbeddingModel|string|null $embeddingModel = null,
        Loader|string|null $loader = null,
    ): self {
        $obj = new self;

        $obj->bucketName = $bucketName;

        null !== $documentChunkOverlapSize && $obj->documentChunkOverlapSize = $documentChunkOverlapSize;
        null !== $documentChunkSize && $obj->documentChunkSize = $documentChunkSize;
        null !== $embeddingModel && $obj['embeddingModel'] = $embeddingModel;
        null !== $loader && $obj['loader'] = $loader;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucketName = $bucketName;

        return $obj;
    }

    public function withDocumentChunkOverlapSize(
        int $documentChunkOverlapSize
    ): self {
        $obj = clone $this;
        $obj->documentChunkOverlapSize = $documentChunkOverlapSize;

        return $obj;
    }

    public function withDocumentChunkSize(int $documentChunkSize): self
    {
        $obj = clone $this;
        $obj->documentChunkSize = $documentChunkSize;

        return $obj;
    }

    /**
     * Supported models to vectorize and embed documents.
     *
     * @param EmbeddingModel|value-of<EmbeddingModel> $embeddingModel
     */
    public function withEmbeddingModel(
        EmbeddingModel|string $embeddingModel
    ): self {
        $obj = clone $this;
        $obj['embeddingModel'] = $embeddingModel;

        return $obj;
    }

    /**
     * Supported types of custom document loaders for embeddings.
     *
     * @param Loader|value-of<Loader> $loader
     */
    public function withLoader(Loader|string $loader): self
    {
        $obj = clone $this;
        $obj['loader'] = $loader;

        return $obj;
    }
}
