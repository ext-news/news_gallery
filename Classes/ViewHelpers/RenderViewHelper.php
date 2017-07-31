<?php

namespace GeorgRinger\NewsGallery\ViewHelpers;

/**
 * This file is part of the "news_gallery" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface;
use TYPO3\CMS\Frontend\Resource\FileCollector;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Render galleries
 */
class RenderViewHelper extends AbstractViewHelper implements CompilableInterface
{

    use CompileWithRenderStatic;

    /** @var bool */
    protected $escapeOutput = false;

    /**
     * Initialize required arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument('as', 'string', 'Output variable', true);
        $this->registerArgument('folder', 'string', 'Folder');
        $this->registerArgument('storage', 'string', 'Storage');
        $this->registerArgument('collections', 'string', 'List of collections');
    }

    /**
     * Output media items
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $fileCollector = GeneralUtility::makeInstance(FileCollector::class);

        // collections
        if (!empty($arguments['collections'])) {
            $collections = GeneralUtility::intExplode(',', $arguments['collections'], TRUE);
            if (!empty($collections)) {
                $fileCollector->addFilesFromFileCollections($collections);
            }
        }

        // folders
        if (!empty($arguments['folder']) && !empty($arguments['storage'])) {
            $identifier = $arguments['storage'] . ':' . $arguments['folder'];
            $fileCollector->addFilesFromFolder($identifier);
        }

        $files = $fileCollector->getFiles();
        $as = $arguments['as'];

        $renderingContext->getVariableProvider()->add($as, $files);
        $output = $renderChildrenClosure();
        $renderingContext->getVariableProvider()->remove($as);

        return $output;
    }
}
