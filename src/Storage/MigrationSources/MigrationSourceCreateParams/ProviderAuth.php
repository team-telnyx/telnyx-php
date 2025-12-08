<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources\MigrationSourceCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProviderAuthShape = array{
 *   access_key?: string|null, secret_access_key?: string|null
 * }
 */
final class ProviderAuth implements BaseModel
{
    /** @use SdkModel<ProviderAuthShape> */
    use SdkModel;

    /**
     * AWS Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here.
     */
    #[Optional]
    public ?string $access_key;

    /**
     * AWS Secret Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here as well.
     */
    #[Optional]
    public ?string $secret_access_key;

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
        ?string $access_key = null,
        ?string $secret_access_key = null
    ): self {
        $obj = new self;

        null !== $access_key && $obj['access_key'] = $access_key;
        null !== $secret_access_key && $obj['secret_access_key'] = $secret_access_key;

        return $obj;
    }

    /**
     * AWS Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here.
     */
    public function withAccessKey(string $accessKey): self
    {
        $obj = clone $this;
        $obj['access_key'] = $accessKey;

        return $obj;
    }

    /**
     * AWS Secret Access Key. For Telnyx-to-Telnyx migrations, use your Telnyx API key here as well.
     */
    public function withSecretAccessKey(string $secretAccessKey): self
    {
        $obj = clone $this;
        $obj['secret_access_key'] = $secretAccessKey;

        return $obj;
    }
}
