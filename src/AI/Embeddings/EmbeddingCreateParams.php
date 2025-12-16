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
 *   bucketName: string,
 *   documentChunkOverlapSize?: int|null,
 *   documentChunkSize?: int|null,
 *   embeddingModel?: null|EmbeddingModel|value-of<EmbeddingModel>,
 *   loader?: null|Loader|value-of<Loader>,
 * }
 */
final class EmbeddingCreateParams implements BaseModel
{
    /** @use SdkModel<EmbeddingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('bucket_name')]
    public string $bucketName;

    #[Optional('document_chunk_overlap_size')]
    public ?int $documentChunkOverlapSize;

    #[Optional('document_chunk_size')]
    public ?int $documentChunkSize;

    /**
     * Supported models to vectorize and embed documents.
     *
     * @var value-of<EmbeddingModel>|null $embeddingModel
     */
    #[Optional('embedding_model', enum: EmbeddingModel::class)]
    public ?string $embeddingModel;

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
        $self = new self;

        $self['bucketName'] = $bucketName;

        null !== $documentChunkOverlapSize && $self['documentChunkOverlapSize'] = $documentChunkOverlapSize;
        null !== $documentChunkSize && $self['documentChunkSize'] = $documentChunkSize;
        null !== $embeddingModel && $self['embeddingModel'] = $embeddingModel;
        null !== $loader && $self['loader'] = $loader;

        return $self;
    }

    public function withBucketName(string $bucketName): self
    {
        $self = clone $this;
        $self['bucketName'] = $bucketName;

        return $self;
    }

    public function withDocumentChunkOverlapSize(
        int $documentChunkOverlapSize
    ): self {
        $self = clone $this;
        $self['documentChunkOverlapSize'] = $documentChunkOverlapSize;

        return $self;
    }

    public function withDocumentChunkSize(int $documentChunkSize): self
    {
        $self = clone $this;
        $self['documentChunkSize'] = $documentChunkSize;

        return $self;
    }

    /**
     * Supported models to vectorize and embed documents.
     *
     * @param EmbeddingModel|value-of<EmbeddingModel> $embeddingModel
     */
    public function withEmbeddingModel(
        EmbeddingModel|string $embeddingModel
    ): self {
        $self = clone $this;
        $self['embeddingModel'] = $embeddingModel;

        return $self;
    }

    /**
     * Supported types of custom document loaders for embeddings.
     *
     * @param Loader|value-of<Loader> $loader
     */
    public function withLoader(Loader|string $loader): self
    {
        $self = clone $this;
        $self['loader'] = $loader;

        return $self;
    }
}
