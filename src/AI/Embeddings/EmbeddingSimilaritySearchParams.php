<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmbeddingSimilaritySearchParams); // set properties as needed
 * $client->ai.embeddings->similaritySearch(...$params->toArray());
 * ```
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
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.embeddings->similaritySearch(...$params->toArray());`
 *
 * @see Telnyx\AI\Embeddings->similaritySearch
 *
 * @phpstan-type embedding_similarity_search_params = array{
 *   bucketName: string, query: string, numOfDocs?: int
 * }
 */
final class EmbeddingSimilaritySearchParams implements BaseModel
{
    /** @use SdkModel<embedding_similarity_search_params> */
    use SdkModel;
    use SdkParams;

    #[Api('bucket_name')]
    public string $bucketName;

    #[Api]
    public string $query;

    #[Api('num_of_docs', optional: true)]
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

        $obj->bucketName = $bucketName;
        $obj->query = $query;

        null !== $numOfDocs && $obj->numOfDocs = $numOfDocs;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucketName = $bucketName;

        return $obj;
    }

    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj->query = $query;

        return $obj;
    }

    public function withNumOfDocs(int $numOfDocs): self
    {
        $obj = clone $this;
        $obj->numOfDocs = $numOfDocs;

        return $obj;
    }
}
