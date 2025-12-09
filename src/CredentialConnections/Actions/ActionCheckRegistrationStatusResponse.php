<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data\Status;

/**
 * @phpstan-type ActionCheckRegistrationStatusResponseShape = array{
 *   data?: Data|null
 * }
 */
final class ActionCheckRegistrationStatusResponse implements BaseModel
{
    /** @use SdkModel<ActionCheckRegistrationStatusResponseShape> */
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
     *   ipAddress?: string|null,
     *   lastRegistration?: string|null,
     *   port?: int|null,
     *   recordType?: string|null,
     *   sipUsername?: string|null,
     *   status?: value-of<Status>|null,
     *   transport?: string|null,
     *   userAgent?: string|null,
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
     *   ipAddress?: string|null,
     *   lastRegistration?: string|null,
     *   port?: int|null,
     *   recordType?: string|null,
     *   sipUsername?: string|null,
     *   status?: value-of<Status>|null,
     *   transport?: string|null,
     *   userAgent?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
