<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\ProviderAuth;

/**
 * @phpstan-type MigrationSourceDeleteResponseShape = array{
 *   data?: MigrationSourceParams|null
 * }
 */
final class MigrationSourceDeleteResponse implements BaseModel
{
    /** @use SdkModel<MigrationSourceDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MigrationSourceParams $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MigrationSourceParams|array{
     *   bucket_name: string,
     *   provider: value-of<Provider>,
     *   provider_auth: ProviderAuth,
     *   id?: string|null,
     *   source_region?: string|null,
     * } $data
     */
    public static function with(MigrationSourceParams|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param MigrationSourceParams|array{
     *   bucket_name: string,
     *   provider: value-of<Provider>,
     *   provider_auth: ProviderAuth,
     *   id?: string|null,
     *   source_region?: string|null,
     * } $data
     */
    public function withData(MigrationSourceParams|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
