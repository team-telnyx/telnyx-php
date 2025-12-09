<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Success response with details about a push credential.
 *
 * @phpstan-type PushCredentialResponseShape = array{data?: PushCredential|null}
 */
final class PushCredentialResponse implements BaseModel
{
    /** @use SdkModel<PushCredentialResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PushCredential $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PushCredential|array{
     *   id: string,
     *   alias: string,
     *   certificate: string,
     *   createdAt: \DateTimeInterface,
     *   privateKey: string,
     *   projectAccountJsonFile: array<string,mixed>,
     *   recordType: string,
     *   type: string,
     *   updatedAt: \DateTimeInterface,
     * } $data
     */
    public static function with(PushCredential|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PushCredential|array{
     *   id: string,
     *   alias: string,
     *   certificate: string,
     *   createdAt: \DateTimeInterface,
     *   privateKey: string,
     *   projectAccountJsonFile: array<string,mixed>,
     *   recordType: string,
     *   type: string,
     *   updatedAt: \DateTimeInterface,
     * } $data
     */
    public function withData(PushCredential|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
