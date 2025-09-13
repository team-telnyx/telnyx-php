<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources\MigrationSourceCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type provider_auth = array{
 *   accessKey?: string, secretAccessKey?: string
 * }
 */
final class ProviderAuth implements BaseModel
{
    /** @use SdkModel<provider_auth> */
    use SdkModel;

    /**
     * AWS Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here.
     */
    #[Api('access_key', optional: true)]
    public ?string $accessKey;

    /**
     * AWS Secret Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here as well.
     */
    #[Api('secret_access_key', optional: true)]
    public ?string $secretAccessKey;

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
        ?string $accessKey = null,
        ?string $secretAccessKey = null
    ): self {
        $obj = new self;

        null !== $accessKey && $obj->accessKey = $accessKey;
        null !== $secretAccessKey && $obj->secretAccessKey = $secretAccessKey;

        return $obj;
    }

    /**
     * AWS Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here.
     */
    public function withAccessKey(string $accessKey): self
    {
        $obj = clone $this;
        $obj->accessKey = $accessKey;

        return $obj;
    }

    /**
     * AWS Secret Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here as well.
     */
    public function withSecretAccessKey(string $secretAccessKey): self
    {
        $obj = clone $this;
        $obj->secretAccessKey = $secretAccessKey;

        return $obj;
    }
}
