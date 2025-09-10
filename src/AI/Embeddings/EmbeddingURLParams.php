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
 * $params = (new EmbeddingURLParams); // set properties as needed
 * $client->ai.embeddings->url(...$params->toArray());
 * ```
 * Embed website content from a specified URL, including child pages up to 5 levels deep within the same domain. The process crawls and loads content from the main URL and its linked pages into a Telnyx Cloud Storage bucket. As soon as each webpage is added to the bucket, its content is immediately processed for embeddings, that can be used for [similarity search](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding-similarity-search) and [clustering](https://developers.telnyx.com/docs/inference/clusters).
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.embeddings->url(...$params->toArray());`
 *
 * @see Telnyx\AI\Embeddings->url
 *
 * @phpstan-type embedding_url_params = array{bucketName: string, url: string}
 */
final class EmbeddingURLParams implements BaseModel
{
    /** @use SdkModel<embedding_url_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Name of the bucket to store the embeddings. This bucket must already exist.
     */
    #[Api('bucket_name')]
    public string $bucketName;

    /**
     * The URL of the webpage to embed.
     */
    #[Api]
    public string $url;

    /**
     * `new EmbeddingURLParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingURLParams::with(bucketName: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingURLParams)->withBucketName(...)->withURL(...)
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
    public static function with(string $bucketName, string $url): self
    {
        $obj = new self;

        $obj->bucketName = $bucketName;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Name of the bucket to store the embeddings. This bucket must already exist.
     */
    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucketName = $bucketName;

        return $obj;
    }

    /**
     * The URL of the webpage to embed.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
