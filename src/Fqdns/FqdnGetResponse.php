<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FqdnGetResponseShape = array{data?: Fqdn|null}
 */
final class FqdnGetResponse implements BaseModel
{
    /** @use SdkModel<FqdnGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Fqdn $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Fqdn|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: string|null,
     *   dnsRecordType?: string|null,
     *   fqdn?: string|null,
     *   port?: int|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(Fqdn|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Fqdn|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: string|null,
     *   dnsRecordType?: string|null,
     *   fqdn?: string|null,
     *   port?: int|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(Fqdn|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
