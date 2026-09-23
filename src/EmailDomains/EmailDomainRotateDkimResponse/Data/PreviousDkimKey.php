<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\PreviousDkimKey\Status;

/**
 * The retired previous key, or null when the domain had no active key before rotation. Retained in a `retiring` state so it can be revoked after the DNS propagation grace period.
 *
 * @phpstan-type PreviousDkimKeyShape = array{
 *   id: string, selector: string, status: Status|value-of<Status>, version: int
 * }
 */
final class PreviousDkimKey implements BaseModel
{
    /** @use SdkModel<PreviousDkimKeyShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $selector;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public int $version;

    /**
     * `new PreviousDkimKey()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PreviousDkimKey::with(id: ..., selector: ..., status: ..., version: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PreviousDkimKey)
     *   ->withID(...)
     *   ->withSelector(...)
     *   ->withStatus(...)
     *   ->withVersion(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $selector,
        Status|string $status,
        int $version
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['selector'] = $selector;
        $self['status'] = $status;
        $self['version'] = $version;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withSelector(string $selector): self
    {
        $self = clone $this;
        $self['selector'] = $selector;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
