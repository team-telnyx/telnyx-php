<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs\FineTuningJob;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The hyperparameters used for the fine-tuning job.
 *
 * @phpstan-type HyperparametersShape = array{nEpochs: int}
 */
final class Hyperparameters implements BaseModel
{
    /** @use SdkModel<HyperparametersShape> */
    use SdkModel;

    /**
     * The number of epochs to train the model for. An epoch refers to one full cycle through the training dataset.
     */
    #[Required('n_epochs')]
    public int $nEpochs;

    /**
     * `new Hyperparameters()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Hyperparameters::with(nEpochs: ...)
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
    public static function with(int $nEpochs = 3): self
    {
        $obj = new self;

        $obj['nEpochs'] = $nEpochs;

        return $obj;
    }

    /**
     * The number of epochs to train the model for. An epoch refers to one full cycle through the training dataset.
     */
    public function withNEpochs(int $nEpochs): self
    {
        $obj = clone $this;
        $obj['nEpochs'] = $nEpochs;

        return $obj;
    }
}
