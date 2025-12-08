<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FqdnDeleteResponseShape = array{data?: Fqdn|null}
 */
final class FqdnDeleteResponse implements BaseModel
{
    /** @use SdkModel<FqdnDeleteResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   connection_id?: string|null,
     *   created_at?: string|null,
     *   dns_record_type?: string|null,
     *   fqdn?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
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
     *   connection_id?: string|null,
     *   created_at?: string|null,
     *   dns_record_type?: string|null,
     *   fqdn?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Fqdn|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
