<?php
/**
 * Pop PHP Framework (http://www.popphp.org/)
 *
 * @link       https://github.com/popphp/popphp2
 * @category   Pop
 * @package    Pop_Image
 * @author     Nick Sagona, III <dev@nolainteractive.com>
 * @copyright  Copyright (c) 2009-2014 NOLA Interactive, LLC. (http://www.nolainteractive.com)
 * @license    http://www.popphp.org/license     New BSD License
 */

/**
 * @namespace
 */
namespace Pop\Image;

/**
 * Image interface
 *
 * @category   Pop
 * @package    Pop_Image
 * @author     Nick Sagona, III <dev@nolainteractive.com>
 * @copyright  Copyright (c) 2009-2014 NOLA Interactive, LLC. (http://www.nolainteractive.com)
 * @license    http://www.popphp.org/license     New BSD License
 * @version    2.0.0a
 */
interface ImageInterface
{

    /**
     * Check if the required image library extension is installed.
     *
     * @return boolean
     */
    public static function isInstalled();

    /**
     * Get the allowed image formats
     *
     * @return array
     */
    public static function getFormats();

    /**
     * Create a new image resource
     *
     * @param  int    $width
     * @param  int    $height
     * @param  string $image
     * @return ImageInterface
     */
    public function create($width, $height, $image = null);

    /**
     * Load an existing image as a resource
     *
     * @param  string $image
     * @throws Exception
     * @return ImageInterface
     */
    public function load($image);

    /**
     * Set the image adjust object
     *
     * @param  Adjust\AdjustInterface $adjust
     * @return ImageInterface
     */
    public function setAdjust(Adjust\AdjustInterface $adjust);

    /**
     * Set the image draw object
     *
     * @param  Draw\DrawInterface $draw
     * @return ImageInterface
     */
    public function setDraw(Draw\DrawInterface $draw);

    /**
     * Set the image effect object
     *
     * @param  Effect\EffectInterface $effect
     * @return ImageInterface
     */
    public function setEffect(Effect\EffectInterface $effect);

    /**
     * Set the image filter object
     *
     * @param  Filter\FilterInterface $filter
     * @return ImageInterface
     */
    public function setFilter(Filter\FilterInterface $filter);

    /**
     * Set the image layer object
     *
     * @param  Layer\LayerInterface $layer
     * @return ImageInterface
     */
    public function setLayer(Layer\LayerInterface $layer);

    /**
     * Set the image type object
     *
     * @param  Type\TypeInterface $type
     * @return ImageInterface
     */
    public function setType(Type\TypeInterface $type);

    /**
     * Get the image adjust object
     *
     * @return Adjust\AdjustInterface
     */
    public function adjust();

    /**
     * Get the image draw object
     *
     * @return Draw\DrawInterface
     */
    public function draw();

    /**
     * Get the image effect object
     *
     * @return Effect\EffectInterface
     */
    public function effect();

    /**
     * Get the image filter object
     *
     * @return Filter\FilterInterface
     */
    public function filter();

    /**
     * Get the image layer object
     *
     * @return Layer\LayerInterface
     */
    public function layer();

    /**
     * Get the image type object
     *
     * @return Type\TypeInterface
     */
    public function type();

    /**
     * Get the image resource
     *
     * @return resource
     */
    public function getAllowedTypes();

    /**
     * Get the image resource
     *
     * @return resource
     */
    public function resource();

    /**
     * Get the image extension info
     *
     * @return \ArrayObject
     */
    public function info();

    /**
     * Get the image extension version
     *
     * @return string
     */
    public function version();

    /**
     * Get the image full path
     *
     * @return string
     */
    public function getFullpath();

    /**
     * Get the image directory
     *
     * @return string
     */
    public function getDir();

    /**
     * Get the image basename
     *
     * @return string
     */
    public function getBasename();

    /**
     * Get the image filename
     *
     * @return string
     */
    public function getFilename();

    /**
     * Get the image extension
     *
     * @return string
     */
    public function getExtension();

    /**
     * Get the image size
     *
     * @return int
     */
    public function getSize();

    /**
     * Get the image mime type
     *
     * @return string
     */
    public function getMime();

    /**
     * Get the image width.
     *
     * @return int
     */
    public function getWidth();

    /**
     * Get the image height.
     *
     * @return int
     */
    public function getHeight();

    /**
     * Get the image quality.
     *
     * @return int
     */
    public function getQuality();

    /**
     * Get the image compression.
     *
     * @return int
     */
    public function getCompression();

    /**
     * Set the image quality.
     *
     * @param  int $quality
     * @return ImageInterface
     */
    public function setQuality($quality);

    /**
     * Set the image compression.
     *
     * @param  int $compression
     * @return ImageInterface
     */
    public function setCompression($compression);

    /**
     * Resize the image object to the width parameter passed.
     *
     * @param  int $w
     * @return ImageInterface
     */
    public function resizeToWidth($w);

    /**
     * Resize the image object to the height parameter passed.
     *
     * @param  int $h
     * @return ImageInterface
     */
    public function resizeToHeight($h);

    /**
     * Resize the image object, allowing for the largest dimension to be scaled
     * to the value of the $px argument.
     *
     * @param  int $px
     * @return ImageInterface
     */
    public function resize($px);

    /**
     * Scale the image object, allowing for the dimensions to be scaled
     * proportionally to the value of the $scl argument.
     *
     * @param  float $scale
     * @return ImageInterface
     */
    public function scale($scale);

    /**
     * Crop the image object to a image whose dimensions are based on the
     * value of the $wid and $hgt argument. The optional $x and $y arguments
     * allow for the adjustment of the crop to select a certain area of the
     * image to be cropped.
     *
     * @param  int $w
     * @param  int $h
     * @param  int $x
     * @param  int $y
     * @return ImageInterface
     */
    public function crop($w, $h, $x = 0, $y = 0);

    /**
     * Crop the image object to a square image whose dimensions are based on the
     * value of the $px argument. The optional $offset argument allows for the
     * adjustment of the crop to select a certain area of the image to be
     * cropped.
     *
     * @param  int $px
     * @param  int $offset
     * @return ImageInterface
     */
    public function cropThumb($px, $offset = null);

    /**
     * Rotate the image object
     *
     * @param  int   $degrees
     * @param  array $bgColor
     * @throws Exception
     * @return ImageInterface
     */
    public function rotate($degrees, array $bgColor = [255, 255, 255]);

    /**
     * Method to flip the image over the x-axis.
     *
     * @return ImageInterface
     */
    public function flip();

    /**
     * Method to flip the image over the y-axis.
     *
     * @return ImageInterface
     */
    public function flop();

    /**
     * Convert the image object to another format.
     *
     * @param  string $type
     * @throws Exception
     * @return ImageInterface
     */
    public function convert($type);

    /**
     * Save the image object to disk.
     *
     * @param  string $to
     * @return void
     */
    public function save($to = null);

    /**
     * Output the image object directly.
     *
     * @param  boolean $download
     * @return void
     */
    public function output($download = false);

    /**
     * Destroy the image object and the related image file directly.
     *
     * @param  boolean $delete
     * @return void
     */
    public function destroy($delete = false);

    /**
     * Create and return a color.
     *
     * @param  array   $color
     * @throws Exception
     * @return mixed
     */
    public function getColor(array $color);

}
