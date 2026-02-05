<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReplacedLinkClickShape from \Telnyx\Webhooks\ReplacedLinkClick
 *
 * @phpstan-type ReplacedLinkClickWebhookEventShape = array{
 *   data?: null|ReplacedLinkClick|ReplacedLinkClickShape
 * }
 */
final class ReplacedLinkClickWebhookEvent implements BaseModel
{
    /** @use SdkModel<ReplacedLinkClickWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ReplacedLinkClick $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ReplacedLinkClick|ReplacedLinkClickShape|null $data
     */
    public static function with(ReplacedLinkClick|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ReplacedLinkClick|ReplacedLinkClickShape $data
     */
    public function withData(ReplacedLinkClick|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
