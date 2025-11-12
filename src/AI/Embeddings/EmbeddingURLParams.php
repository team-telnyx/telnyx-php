<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Embed website content from a specified URL, including child pages up to 5 levels deep within the same domain. The process crawls and loads content from the main URL and its linked pages into a Telnyx Cloud Storage bucket. As soon as each webpage is added to the bucket, its content is immediately processed for embeddings, that can be used for [similarity search](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding-similarity-search) and [clustering](https://developers.telnyx.com/docs/inference/clusters).
 *
 * @see Telnyx\Services\AI\EmbeddingsService::url()
 *
 * @phpstan-type EmbeddingURLParamsShape = array{bucket_name: string, url: string}
 */
final class EmbeddingURLParams implements BaseModel
{
    /** @use SdkModel<EmbeddingURLParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Name of the bucket to store the embeddings. This bucket must already exist.
     */
    #[Api]
    public string $bucket_name;

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
     * EmbeddingURLParams::with(bucket_name: ..., url: ...)
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
    public static function with(string $bucket_name, string $url): self
    {
        $obj = new self;

        $obj->bucket_name = $bucket_name;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Name of the bucket to store the embeddings. This bucket must already exist.
     */
    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucket_name = $bucketName;

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
