<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
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
 * @see Telnyx\Services\AI\EmbeddingsService::similaritySearch()
 *
 * @phpstan-type EmbeddingSimilaritySearchParamsShape = array{
 *   bucketName: string, query: string, numOfDocs?: int
 * }
 */
final class EmbeddingSimilaritySearchParams implements BaseModel
{
    /** @use SdkModel<EmbeddingSimilaritySearchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('bucket_name')]
    public string $bucketName;

    #[Required]
    public string $query;

    #[Optional('num_of_docs')]
    public ?int $numOfDocs;

    /**
     * `new EmbeddingSimilaritySearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingSimilaritySearchParams::with(bucketName: ..., query: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingSimilaritySearchParams)->withBucketName(...)->withQuery(...)
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
     */
    public static function with(
        string $bucketName,
        string $query,
        ?int $numOfDocs = null
    ): self {
        $obj = new self;

        $obj['bucketName'] = $bucketName;
        $obj['query'] = $query;

        null !== $numOfDocs && $obj['numOfDocs'] = $numOfDocs;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj['bucketName'] = $bucketName;

        return $obj;
    }

    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj['query'] = $query;

        return $obj;
    }

    public function withNumOfDocs(int $numOfDocs): self
    {
        $obj = clone $this;
        $obj['numOfDocs'] = $numOfDocs;

        return $obj;
    }
}
