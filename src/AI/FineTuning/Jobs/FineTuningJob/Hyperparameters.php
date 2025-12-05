<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs\FineTuningJob;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The hyperparameters used for the fine-tuning job.
 *
 * @phpstan-type HyperparametersShape = array{n_epochs: int}
 */
final class Hyperparameters implements BaseModel
{
    /** @use SdkModel<HyperparametersShape> */
    use SdkModel;

    /**
     * The number of epochs to train the model for. An epoch refers to one full cycle through the training dataset.
     */
    #[Api]
    public int $n_epochs;

    /**
     * `new Hyperparameters()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Hyperparameters::with(n_epochs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Hyperparameters)->withNEpochs(...)
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
     */
    public static function with(int $n_epochs = 3): self
    {
        $obj = new self;

        $obj['n_epochs'] = $n_epochs;

        return $obj;
    }

    /**
     * The number of epochs to train the model for. An epoch refers to one full cycle through the training dataset.
     */
    public function withNEpochs(int $nEpochs): self
    {
        $obj = clone $this;
        $obj['n_epochs'] = $nEpochs;

        return $obj;
    }
}
