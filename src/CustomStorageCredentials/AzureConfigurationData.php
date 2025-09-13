<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type azure_configuration_data = array{
 *   accountKey?: string, accountName?: string, bucket?: string
 * }
 */
final class AzureConfigurationData implements BaseModel
{
    /** @use SdkModel<azure_configuration_data> */
    use SdkModel;

    /**
     * Azure Blob Storage account key.
     */
    #[Api('account_key', optional: true)]
    public ?string $accountKey;

    /**
     * Azure Blob Storage account name.
     */
    #[Api('account_name', optional: true)]
    public ?string $accountName;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Api(optional: true)]
    public ?string $bucket;

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
        ?string $accountKey = null,
        ?string $accountName = null,
        ?string $bucket = null
    ): self {
        $obj = new self;

        null !== $accountKey && $obj->accountKey = $accountKey;
        null !== $accountName && $obj->accountName = $accountName;
        null !== $bucket && $obj->bucket = $bucket;

        return $obj;
    }

    /**
     * Azure Blob Storage account key.
     */
    public function withAccountKey(string $accountKey): self
    {
        $obj = clone $this;
        $obj->accountKey = $accountKey;

        return $obj;
    }

    /**
     * Azure Blob Storage account name.
     */
    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj->accountName = $accountName;

        return $obj;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }
}
