<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse;

use Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse\Data\Summary;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A namespace's settings, grouped by what they affect.
 *
 * @phpstan-import-type SummaryShape from \Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse\Data\Summary
 *
 * @phpstan-type DataShape = array{summary?: null|Summary|SummaryShape}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Settings that shape this namespace's summaries.
     */
    #[Optional]
    public ?Summary $summary;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Summary|SummaryShape|null $summary
     */
    public static function with(Summary|array|null $summary = null): self
    {
        $self = new self;

        null !== $summary && $self['summary'] = $summary;

        return $self;
    }

    /**
     * Settings that shape this namespace's summaries.
     *
     * @param Summary|SummaryShape $summary
     */
    public function withSummary(Summary|array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }
}
