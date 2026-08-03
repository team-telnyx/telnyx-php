<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Replaces both sender filter lists atomically. Omitting either list clears
 * that list. Use `POST` or `DELETE` for incremental changes.
 *
 * @see Telnyx\Services\EmailInboxes\FiltersService::replace()
 *
 * @phpstan-type FilterReplaceParamsShape = array{
 *   allowlist?: list<string>|null, blocklist?: list<string>|null
 * }
 */
final class FilterReplaceParams implements BaseModel
{
    /** @use SdkModel<FilterReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $allowlist */
    #[Optional(list: 'string')]
    public ?array $allowlist;

    /** @var list<string>|null $blocklist */
    #[Optional(list: 'string')]
    public ?array $blocklist;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $allowlist
     * @param list<string>|null $blocklist
     */
    public static function with(
        ?array $allowlist = null,
        ?array $blocklist = null
    ): self {
        $self = new self;

        null !== $allowlist && $self['allowlist'] = $allowlist;
        null !== $blocklist && $self['blocklist'] = $blocklist;

        return $self;
    }

    /**
     * @param list<string> $allowlist
     */
    public function withAllowlist(array $allowlist): self
    {
        $self = clone $this;
        $self['allowlist'] = $allowlist;

        return $self;
    }

    /**
     * @param list<string> $blocklist
     */
    public function withBlocklist(array $blocklist): self
    {
        $self = clone $this;
        $self['blocklist'] = $blocklist;

        return $self;
    }
}
