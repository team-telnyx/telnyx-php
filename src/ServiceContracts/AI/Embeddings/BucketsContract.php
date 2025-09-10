<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Embeddings;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse;
use Telnyx\AI\Embeddings\Buckets\BucketListResponse;
use Telnyx\RequestOptions;

interface BucketsContract
{
    /**
     * @api
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BucketGetResponse;

    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): BucketListResponse;

    /**
     * @api
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
