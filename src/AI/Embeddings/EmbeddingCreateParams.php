<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\AI\Embeddings\EmbeddingCreateParams\EmbeddingModel;
use Telnyx\AI\Embeddings\EmbeddingCreateParams\Loader;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
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
 * @see Telnyx\Services\AI\EmbeddingsService::create()
 *
 * @phpstan-type EmbeddingCreateParamsShape = array{
 *   bucket_name: string,
 *   document_chunk_overlap_size?: int,
 *   document_chunk_size?: int,
 *   embedding_model?: EmbeddingModel|value-of<EmbeddingModel>,
 *   loader?: Loader|value-of<Loader>,
 * }
 */
final class EmbeddingCreateParams implements BaseModel
{
    /** @use SdkModel<EmbeddingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $bucket_name;

    #[Optional]
    public ?int $document_chunk_overlap_size;

    #[Optional]
    public ?int $document_chunk_size;

    /**
     * Supported models to vectorize and embed documents.
     *
     * @var value-of<EmbeddingModel>|null $embedding_model
     */
    #[Optional(enum: EmbeddingModel::class)]
    public ?string $embedding_model;

    /**
     * Supported types of custom document loaders for embeddings.
     *
     * @var value-of<Loader>|null $loader
     */
    #[Optional(enum: Loader::class)]
    public ?string $loader;

    /**
     * `new EmbeddingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingCreateParams::with(bucket_name: ...)
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
     * @param EmbeddingModel|value-of<EmbeddingModel> $embedding_model
     * @param Loader|value-of<Loader> $loader
     */
    public static function with(
        string $bucket_name,
        ?int $document_chunk_overlap_size = null,
        ?int $document_chunk_size = null,
        EmbeddingModel|string|null $embedding_model = null,
        Loader|string|null $loader = null,
    ): self {
        $obj = new self;

        $obj['bucket_name'] = $bucket_name;

        null !== $document_chunk_overlap_size && $obj['document_chunk_overlap_size'] = $document_chunk_overlap_size;
        null !== $document_chunk_size && $obj['document_chunk_size'] = $document_chunk_size;
        null !== $embedding_model && $obj['embedding_model'] = $embedding_model;
        null !== $loader && $obj['loader'] = $loader;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj['bucket_name'] = $bucketName;

        return $obj;
    }

    public function withDocumentChunkOverlapSize(
        int $documentChunkOverlapSize
    ): self {
        $obj = clone $this;
        $obj['document_chunk_overlap_size'] = $documentChunkOverlapSize;

        return $obj;
    }

    public function withDocumentChunkSize(int $documentChunkSize): self
    {
        $obj = clone $this;
        $obj['document_chunk_size'] = $documentChunkSize;

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
        $obj['embedding_model'] = $embeddingModel;

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
