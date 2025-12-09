<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Actions\ActionShareResponse\Data;
use Telnyx\PortingOrders\Actions\ActionShareResponse\Data\Permission;

/**
 * @phpstan-type ActionShareResponseShape = array{data?: Data|null}
 */
final class ActionShareResponse implements BaseModel
{
    /** @use SdkModel<ActionShareResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   token?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   expiresInSeconds?: int|null,
     *   permissions?: list<value-of<Permission>>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   token?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   expiresInSeconds?: int|null,
     *   permissions?: list<value-of<Permission>>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
