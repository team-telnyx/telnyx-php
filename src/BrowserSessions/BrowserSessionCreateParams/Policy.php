<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\BrowserSessionCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PolicyShape = array{allowedDomains: list<string>}
 */
final class Policy implements BaseModel
{
    /** @use SdkModel<PolicyShape> */
    use SdkModel;

    /**
     * Domain patterns the browser can navigate to. Exact match (example.com) or wildcard (*.example.com). IP literals not allowed.
     *
     * @var list<string> $allowedDomains
     */
    #[Required('allowed_domains', list: 'string')]
    public array $allowedDomains;

    /**
     * `new Policy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Policy::with(allowedDomains: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Policy)->withAllowedDomains(...)
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
     * @param list<string> $allowedDomains
     */
    public static function with(array $allowedDomains): self
    {
        $self = new self;

        $self['allowedDomains'] = $allowedDomains;

        return $self;
    }

    /**
     * Domain patterns the browser can navigate to. Exact match (example.com) or wildcard (*.example.com). IP literals not allowed.
     *
     * @param list<string> $allowedDomains
     */
    public function withAllowedDomains(array $allowedDomains): self
    {
        $self = clone $this;
        $self['allowedDomains'] = $allowedDomains;

        return $self;
    }
}
