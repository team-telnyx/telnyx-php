<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\Core\Attributes\Api;
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
 *   bucket_name: string, query: string, num_of_docs?: int
 * }
 */
final class EmbeddingSimilaritySearchParams implements BaseModel
{
    /** @use SdkModel<EmbeddingSimilaritySearchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $bucket_name;

    #[Api]
    public string $query;

    #[Api(optional: true)]
    public ?int $num_of_docs;

    /**
     * `new EmbeddingSimilaritySearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingSimilaritySearchParams::with(bucket_name: ..., query: ...)
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
        string $bucket_name,
        string $query,
        ?int $num_of_docs = null
    ): self {
        $obj = new self;

        $obj['bucket_name'] = $bucket_name;
        $obj['query'] = $query;

        null !== $num_of_docs && $obj['num_of_docs'] = $num_of_docs;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj['bucket_name'] = $bucketName;

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
        $obj['num_of_docs'] = $numOfDocs;

        return $obj;
    }
}
