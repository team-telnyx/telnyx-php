<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\ProviderAuth;

/**
 * @phpstan-type MigrationSourceGetResponseShape = array{
 *   data?: MigrationSourceParams|null
 * }
 */
final class MigrationSourceGetResponse implements BaseModel
{
    /** @use SdkModel<MigrationSourceGetResponseShape> */
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
     *   bucketName: string,
     *   provider: value-of<Provider>,
     *   providerAuth: ProviderAuth,
     *   id?: string|null,
     *   sourceRegion?: string|null,
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
     *   bucketName: string,
     *   provider: value-of<Provider>,
     *   providerAuth: ProviderAuth,
     *   id?: string|null,
     *   sourceRegion?: string|null,
     * } $data
     */
    public function withData(MigrationSourceParams|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
